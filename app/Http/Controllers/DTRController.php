<?php


namespace App\Http\Controllers;


use App\Models\BiometricDevices;
use App\Models\CronLogs;
use App\Models\DailyTimeRecord;
use App\Models\DTR;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\JoEmployees;
use App\Models\UserSubmenu;
use App\Swep\Helpers\__sanitize;
use App\Swep\Helpers\Helper;
use App\Swep\Services\DTRService;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rats\Zkteco\Lib\ZKTeco;
use Spatie\Browsershot\Browsershot;
use Yajra\DataTables\Facades\DataTables;

class DTRController extends  Controller
{
    protected $dtr_service;
    public function __construct(DTRService $dtr_service)
    {
        $this->dtr_service = $dtr_service;
    }


    public function extract2(Request $request){
        if(!$request->has('ip')){
            return 'IP NOT PROVIDED';
        }

        if($request->ip != '21' && $request->ip != '22' && $request->ip != '23'){
            return 'INVALID IP';
        }
        $ip = '10.36.1.'.$request->ip;
        return $this->dtr_service->extract($ip);
    }



    public function reconstruct(){
        return $this->dtr_service->reconstruct();
    }

    public function index(Request $request){
        if($request->ajax()){


            $first = Employee::query()->with('rawDtrRecords')
                ->select(['slug','lastname', 'firstname', 'middlename','biometric_user_id', DB::raw('"PERM" as type'), 'sex','employee_no']);
//            if($request->has('sex')){
//                $first = $first->where('sex','=','MALE');
//            }

            $second = JoEmployees::query()->with('rawDtrRecords')
                ->select(['slug','lastname', 'firstname', 'middlename','biometric_user_id', DB::raw('"COS" as type'), 'sex','employee_no']);
//            if($request->has('sex')){
//                $second = $second->where('sex','=','MALE');
//            }

            $union = $second->union($first);

            $query = DB::table(DB::raw("({$union->toSql()}) as x"))
                ->select(['slug','lastname', 'firstname', 'middlename','biometric_user_id', 'type', 'sex','employee_no'])
                ->where('biometric_user_id','!=',0);
//                ->where(function ($query) {
//                });
            if($request->has('sex')){
                if($request->sex != ''){
                    $query = $query->where('sex','=',$request->sex);
                }
            }

            if($request->has('status')){
                if($request->status != ''){
                    $query = $query->where('type','=',$request->status);
                }
            }

            if($request->has('order')){
                if($request->columns[$request->order[0]['column']]['data'] == 'fullname'){
                    $query = $query->orderBy('lastname',$request->order[0]['dir']);
                }
            }
            return Datatables::of($query)
                ->addColumn('fullname',function ($data){
                    return strtoupper($data->lastname.', '.$data->firstname);
                })->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(x.firstname,'-',x.lastname)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addColumn('last_attendance',function ($data){
                    $dtr = DTR::query()->where('user','=',$data->biometric_user_id)->orderBy('timestamp','desc')->first();
                    if(!empty($dtr)){
                        return Carbon::parse($dtr->timestamp)->format('M. d, Y | h:i A') .' ----- '.$this->dtr_service->biometric_values(true)[$dtr->type];
                    }
                })
                ->editColumn('sex',function ($data){
                    return __html::sex($data->sex);
                })
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.menu.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    if($data->type == 'PERM'){
                        $route = route('dashboard.employee.index')."?q=".$data->employee_no;
                    }
                    if($data->type == 'COS'){
                        $route = route('dashboard.jo_employees.index')."?q=".$data->employee_no;
                    }
                    return '<div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm show_dtr_btn"  data="'.$data->slug.'" data-toggle="modal" data-target="#show_dtr_modal" title="" data-placement="left" data-original-title="View more">
                                    <i class="fa fa-list"></i>
                                </button>
                                <a type="button" href="'.$route.'" target="_blank" class="btn btn-default btn-sm" title="" data-placement="top" data-original-title="View Employee">
                                    <i class="fa fa-user"></i>
                                </a>
                            </div>';
                })
                ->escapeColumns([])
                ->setRowId('slug')
                ->make(true);


        }
        return view('dashboard.dtr.index');
    }

    public function show($slug){
        $p_employee = Employee::query()->where('slug','=',$slug)->first();
        if(empty($p_employee)){
            $jo_employee = JoEmployees::query()->where('slug','=',$slug)->first();
            if(empty($jo_employee)){
                abort(500,'Employee not found');
            }else{
                $employee = $jo_employee;
            }
        }else{
            $employee = $p_employee;
        }

        $dtr_by_year = [];
        if(!empty($employee->dtr_records)){
            $dtr_records = $employee->dtr_records()->orderBy('date','desc')->get();
            if($dtr_records->count() > 0){
                foreach ($dtr_records as $dtr_record) {
                    $dtr_by_year[Carbon::parse($dtr_record->date)->format('Y')][Carbon::parse($dtr_record->date)->format('Y-m')] = null;
                }
            }
        }

        $view = View::make('dashboard.dtr.my_dtr')->with([
            'employee' => $employee,
            'dtr_by_year' => $dtr_by_year,
            'col' => 2,
        ]);
        $sections = $view->renderSections();
        return view('dashboard.dtr.show')->with([
            'section' => $sections['content2'],
            'employee' => $employee,

        ]);
    }
    public function myDtr(){
        $employee = $this->getCurrentUserEmployeeObj();
        $dtr_by_year = [];
        if(!empty($employee->dtr_records)){
            $dtr_records = $employee->dtr_records()->orderBy('date','desc')->get();
            if($dtr_records->count() > 0){
                foreach ($dtr_records as $dtr_record) {
                    $dtr_by_year[Carbon::parse($dtr_record->date)->format('Y')][Carbon::parse($dtr_record->date)->format('Y-m')] = null;
                }
            }
        }
        return view('dashboard.dtr.my_dtr')->with([
            'employee' => $employee,
            'dtr_by_year' => $dtr_by_year,
            'col' => 1,
        ]);
    }

    public function fetchByUserAndMonth(Request $request){

        if(request()->has('bm_u_id') || request()->has('month')){
            if(!$request->ajax()){
                if($request->bm_u_id != Auth::user()->employeeUnion->biometric_user_id){
                    abort(404);
                }
                $bm_u_id = Auth::user()->employeeUnion->biometric_user_id;
            }else{
                $bm_u_id = $request->bm_u_id;
            }

            $dtrs = DailyTimeRecord::query()->where('biometric_user_id','=',$request->bm_u_id)->
                where('date','like',$request->month.'%')->orderBy('date','asc')->get();
            $dtr_array = [];
            if($dtrs->count() > 0){
                foreach ($dtrs as $dtr) {
                    $dtr_array[$dtr->date] = $dtr;
                }
            }

            $perm_employee = Employee::query()->where('biometric_user_id','=',$bm_u_id)->first();
            if(!empty($perm_employee)){
                $employee = $perm_employee;
            }else{
                $jo_employee = JoEmployees::query()->where('biometric_user_id','=',$bm_u_id)->first();
                if(!empty($jo_employee)){
                    $employee = $jo_employee;
                }
            }
            $first_day = $request->month.'-01';
            $first_day_next_month = Carbon::parse($first_day)->addMonth(1)->format('Y-m-d');
            $holidays = $this->holidaysArray($request->month);
            $attendance_logs = DTR::query()
                ->with('deviceDetails')
                ->where('user','=',$request->bm_u_id)
                ->whereBetween('timestamp',[$first_day,$first_day_next_month])
                ->get();
            return view('dashboard.dtr.my_dtr_preview')->with([
                'month' => $request->month,
                'dtr_array' =>  $dtr_array,
                'holidays' => $holidays,
                'attendance_logs' => $attendance_logs,
                'biometric_values' => $this->dtr_service->biometric_values(true),
                'bm_u_id' => $request->bm_u_id,
                'employee' => $employee,
            ]);
        }else{
            abort(404);
        }
    }

    public function download(Request $request){

        if(!request()->has('month')){
            abort(404);
        }
        $sm = UserSubmenu::query()->where('submenu_id','=','VODFKKM')->where('user_id','=',Auth::user()->user_id)->first();

        if(empty($sm)){
            $employee = $this->getCurrentUserEmployeeObj();
        }else{
            $perm_employee = Employee::query()->where('biometric_user_id','=',$request->bm_u_id)->first();

            if(!empty($perm_employee)){
                $employee = $perm_employee;
            }else{
                $jo_employee = JoEmployees::query()->where('biometric_user_id','=',$request->bm_u_id)->first();
                if(!empty($jo_employee)){
                    $employee = $jo_employee;
                }

            }
        }

        $dtrs = DailyTimeRecord::query()->where('biometric_user_id','=',$employee->biometric_user_id)->
        where('date','like',$request->month.'%')->orderBy('date','asc')->get();

        $dtr_array = [];
        if($dtrs->count() > 0){
            foreach ($dtrs as $dtr) {
                $dtr_array[$dtr->date] = $dtr;
            }
        }

        $holidays = $this->holidaysArray($request->month);


        $data = [
            'month' => $request->month,
            'dtr_array' =>  $dtr_array,
            'holidays' => $holidays,
            'employee' => $employee,
            'sup_name' => $request->sup_name,
        ];

        //return $request;
        $pdf = PDF::loadView('dashboard.dtr.downloadable_dtr',$data)->setPaper('letter');
        return view('dashboard.dtr.downloadable_dtr',$data);
        //$pdf->adminPassword('123456');
        return $pdf->download('DTR-'.$employee->lastname.'-'.Carbon::parse($request->month)->format("Y,F").'.pdf');

    }

    public function holidaysArray($month = null){
        $holidays_array = [];
        if($month != null){
            $month = Carbon::parse($month)->format('Y-m');
            $holidays = Holiday::query()->where('date','like',$month.'%')->get();
        }else{
            $holidays = Holiday::query()->get();
        }

        if($holidays->count() > 0){
            foreach ($holidays as $holiday){
                $holidays_array[$holiday->date] = [
                    'name' => $holiday->name,
                    'date' => $holiday->date,
                    'type' => $holiday->type,
                ];
            }
        }
        return $holidays_array;
    }

    private function getCurrentUserEmployeeObj(){
        $user_employee_no = Auth::user()->employee_no;
        $perm_employee = Employee::query()->where('employee_no','=',$user_employee_no)->first();
        $employee = null;
        if(!empty($perm_employee)){
            $employee = $perm_employee;
        }else{
            $jo_employee = JoEmployees::query()->where('employee_no','=',$user_employee_no)->first();
            if(!empty($jo_employee)){
                $employee = $jo_employee;
            }
        }
        return $employee;
    }
    private function fetchAttendance($ip){

        $attendance = [];
        $zk = new ZKTeco($ip);
        $zk->connect();
        $zk = $zk->getAttendance();
        foreach ($zk as $data){
            $attendance[$data['uid']] = $data;
        }
        return $attendance;
    }


    private function clearAttendance($ip){

        $zk = new ZKTeco($ip);
        $zk->connect();
        return $zk->clearAttendance();
    }

    private function getSerialNo($ip){
        $zk = new ZKTeco($ip);
        $zk->connect();
        return $zk->serialNumber();
    }

    private function getDeviceIpById($id){
        $biometric_device = BiometricDevices::query()->find($id);
        return $biometric_device->ip_address;
    }

    private  function calculateLateUndertime($appointment_status){

        //PERMANENT EMPLOYEES
        if($appointment_status == 'permanent'){
            $dtrs = DailyTimeRecord::query()->where('calculated' ,'=',0)->get();
            if(!empty($dtrs)){
                foreach ($dtrs as $dtr){
                    $late = 0;
                    $undertime = 0;
                    //CHECK IF AM IN IS LATE
                    if(Carbon::parse($dtr->am_in)->format('His') > '090000'){
                        $late = $late + Carbon::parse($dtr->am_in)->diffInMinutes('09:00:00');
                    }

                    //CHECK IF PM IN IS LATE
                    if(Carbon::parse($dtr->pm_in)->format('His') > '130000'){
                        $late = $late + Carbon::parse($dtr->pm_in)->diffInMinutes('13:00:00');
                    }

                    //CHECK IF AM OUT IS UNDERTIME
                    if(Carbon::parse($dtr->am_out)->format('his') < '120000'){
                        $undertime = $undertime + Carbon::parse($dtr->am_out)->diffInMinutes('12:00:00');
                    }

                    //CHECK IF PM OUT IS UNDERTIME
                    $should_pm_out = '180000';

                    //ADD 9 Hours From AM IN to get AM OUT
                    if($dtr->am_in != null){
                        $should_pm_out = Carbon::parse($dtr->am_in)->addHours(9)->format('His');
                    }

                    //IF AM IN IS EARLIER THAN 7AM
                    if(Carbon::parse($dtr->am_in)->format('His') < '070000'){
                        $should_pm_out = '160000';
                    }

                    //CHECK IF UNDERTIME
                    if(Carbon::parse($dtr->pm_out)->format('His') < Carbon::parse($should_pm_out)->format('His')){
                        $undertime = $undertime + Carbon::parse($dtr->pm_out)->diffInMinutes(date('His',strtotime($should_pm_out)));
                    }

                    $dtr->undertime = $undertime;
                    $dtr->late = $late;
                    $dtr->calculated = 0;
                    $dtr->update();
                }
            }
        }
    }
}