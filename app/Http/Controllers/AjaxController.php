<?php


namespace App\Http\Controllers;


use App\Models\Applicant;
use App\Models\ApplicantPositionApplied;
use App\Models\Course;
use App\Models\Document;
use App\Models\Employee;
use App\Models\HRPayPlanitilla;
use App\Models\SSL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AjaxController extends Controller
{
    public function get($for){

        if($for == 'compute_monthly_salary'){
            return $this->compute_monthly_salary();
        }
        if($for == 'educational_background'){
            return view('ajax.employee.add_school');
        }

        if($for == 'eligibility'){
            return view('ajax.employee.add_eligibility');
        }

        if($for == 'work_experience'){
            $rand = Str::random(16);
            return [
                'view' => view('ajax.employee.add_work_experience')->with([
                                'rand' => $rand,
                            ])->render(),
                'rand' => $rand,
            ];
        }

        if($for == 'close_bulletin'){
            return $this->close_bulletin();
        }

        if($for == 'document_person_to'){
            return $this->document_person_to();
        }
        if($for == 'document_person_from'){
            return $this->document_person_from();
        }
        if($for == 'dv_add_item'){
            return $this->dv_add_item();
        }

        if($for == 'position_applied'){
            return $this->position_applied();
        }

        if($for == 'applicant_courses'){
            return $this->applicant_courses();
        }
        if($for == 'search_active_employees'){
            return $this->search_active_employees();
        }

        if($for == 'applicant_filter_position'){
            return $this->applicant_filter_position();
        }

        if($for == 'applicant_filter_item_no'){
            return $this->applicant_filter_item_no();
        }

    }
    private function applicant_filter_item_no(){
        $arr['results'] = [];
        array_push($arr['results'],['id'=>'','text' => "Don't Filter"]);
        $ps = HRPayPlanitilla::query()->select('item_no','position')
            ->where('position','like','%'.Request::get('q').'%')
            ->orWhere('item_no','like','%'.Request::get('q').'%')
            ->groupBy('item_no')
            ->orderBy('item_no','asc')
            ->limit(20)
            ->get();
        if(!empty($ps)){
            foreach ($ps as $p){
                array_push($arr['results'],[
                    'id' => $p->item_no,
                    'text' => $p->item_no.' - '.$p->position,
                ]);
            }
        }
        return $arr;
    }
    private function applicant_filter_position(){
        $arr['results'] = [];
        array_push($arr['results'],['id'=>'','text' => "Don't Filter"]);
        $ps = ApplicantPositionApplied::query()->select('position_applied')
            ->where('position_applied','like','%'.Request::get('q').'%')
            ->groupBy('position_applied')
            ->orderBy('position_applied','asc')
            ->limit(20)
            ->get();
        if(!empty($ps)){
            foreach ($ps as $p){
                array_push($arr['results'],[
                    'id' => $p->position_applied,
                    'text' => $p->position_applied,
                ]);
            }
        }
        return $arr;
    }
    private function compute_monthly_salary(){
        $latest = SSL::query()->orderBy('date_implemented','desc')->first();
        $latest_date_implemented = $latest->date_implemented;
        $ssl = SSL::query()->where('salary_grade','=',Request::get('sg'))
            ->where('date_implemented','=',$latest_date_implemented)
            ->first();
        $si = 'step'.Request::get('si');

        if(!empty($ssl->$si)){
            return number_format($ssl->$si,2);
        }
        else{
            return 'N/A';
        }
    }

    private function close_bulletin(){
        $last_slug = request('last_slug');
        Session::put('last_slug',$last_slug);

        return Session::get('last_slug');
    }

    private function document_person_to(){
        $arr['results'] = [];
        $docs = Document::query()->select('person_to')->where('person_to','like','%'.Request::get("q").'%')->groupBy('person_to')->limit(30)->get();
        array_push($arr['results'],['id'=>'','text' => "Don't Filter"]);
        if(!empty($docs)){

            foreach ($docs as $doc){
                array_push($arr['results'],['id'=>$doc->person_to,'text' => $doc->person_to]);
            }
        }
        return $arr;
    }

    private function document_person_from(){
        $arr['results'] = [];
        $docs = Document::query()->select('person_from')->where('person_from','like','%'.Request::get("q").'%')->groupBy('person_from')->limit(30)->get();
        array_push($arr['results'],['id'=>'','text' => "Don't Filter"]);
        if(!empty($docs)){
            foreach ($docs as $doc){
                array_push($arr['results'],['id'=>$doc->person_from,'text' => $doc->person_from]);
            }
        }
        return $arr;
    }

    private function dv_add_item(){
        $rcs = \App\Models\RC::query()->get();
        $rand = \Illuminate\Support\Str::random(5);
        return [
            'view' => view('ajax.disbursement_voucher.add_item')->with([
                'rcs'=>$rcs,
                'rand' => $rand,
            ])->render(),
            'rand' => $rand,
        ];
    }

    private function position_applied(){
        $arr = [];
        $pps = HRPayPlanitilla::query()->select('item_no','position')->get();
        foreach ($pps as $pp){
            array_push($arr,'ITEM '.$pp->item_no.' - '.$pp->position);
        }
        return $arr;
    }

    private function applicant_courses(){
        $arr['results'] = [];
        $courses = Course::query()->where('acronym','like','%'.Request::get("q").'%')
            ->orWhere('name','like','%'.Request::get("q").'%')
            ->groupBy('name')->limit(30)->get();
        if(Request::get('default') == 'Select'){
            array_push($arr['results'],['id'=>'','text' => "Select"]);
        }else{
            array_push($arr['results'],['id'=>'','text' => "Don't Filter"]);
        }
        if(!empty($courses)){
            foreach ($courses as $course){
                array_push($arr['results'],['id'=>$course->name,'text' => $course->name]);
            }
        }
        return $arr;
    }

    private function search_active_employees(){
        if(Request::get('afterTypeahead') == true){
            $emp = Employee::query()
                ->select('lastname','firstname','middlename','sex','date_of_birth','civil_status','cell_no')
                ->where('slug','=',Request::get('id'))->first();

            return [
                'lastname' => $emp->lastname,
                'firstname' => $emp->firstname,
                'middlename' => $emp->middlename,
                'sex' => $emp->sex,
                'date_of_birth' => Carbon::parse($emp->date_of_birth)->format('Y-m-d'),
                'civil_status' => $emp->civil_status,
                'cell_no' => $emp->cell_no,
                'civil_status' => $emp->civil_status,
            ];
        }
        $arr = [];
        $find = Request::get('query');

        $emps = Employee::query()
            ->where(function ($query) use($find){
                $query->where('lastname','like','%'.$find.'%')
                    ->orWhere('firstname','like','%'.$find.'%')
                    ->orWhere('middlename','like','%'.$find.'%');
            })
            ->limit(10)
            ->get();

        if(!empty($emps)){
            foreach ($emps as $emp){
                array_push($arr,[
                    'id' => $emp->slug,
                    'name' => $emp->lastname.', '.$emp->firstname.' '.$emp->middlename,
                    'sex' => $emp->sex,
                ]);
            }
        }

        return $arr;
    }
}