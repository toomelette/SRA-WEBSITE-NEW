<?php


namespace App\Swep\Helpers;
use App\Models\CropYear;
use App\Models\MisRequestsNature;
use App\Models\Year;
use App\Models\YearBlockFarm;
use Carbon;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function online_badge($lastActivity,$fullwidth = true){

        if($fullwidth == true){
            $cols = 'col-md-12';
            $br = '</br>';
        }else{
            $cols = '';
            $br = '';
        }
        if($lastActivity == null){
            return '<span class="label bg-gray '.$cols.'">OFFLINE</span>';
        }else{
            $last_activity = Carbon::parse($lastActivity);
            if($last_activity->diffInSeconds() < 301){
                return '<span class="label bg-green '.$cols.'">ONLINE</span>';
            }else{
                if($last_activity->diffInMinutes() < 60){
                    return '<span class="label bg-gray '.$cols.'">Active '.$br.$last_activity->diffInMinutes().' minutes ago</span>';
                }else{
                    if($last_activity->diffInMinutes() >= 60){
                        if($last_activity->diffInHours() < 2){
                            return '<span class="label bg-gray '.$cols.'">Active an hour ago</span>';
                        }else{
                            if($last_activity->diffInHours() > 23){
                                if($last_activity->diffInDays() < 2){
                                    return '<span class="label bg-gray '.$cols.'">Active a day ago</span>';
                                }else{
                                    return '<span class="label bg-gray '.$cols.'">Active '.$br.$last_activity->diffInDays().' days ago</span>';
                                }
                            }
                            return '<span class="label bg-gray '.$cols.'">Active '.$br.$last_activity->diffInHours().' hours ago</span>';
                        }
                    }
                }
            }
        }

    }

    public static function dtr_type($type){
        $types = [
            10 => 'Check in',
            30 => 'Break out',
            20 => 'Break in',
            40 => 'Check out',
            50 => 'Overtime in',
            60 => 'Overtime Out',
        ];
        if(!is_int($type)){
            return 'Must be integer';
        }else{
            if($type < 0 && $type > 5){
                return 'Invalid parameter';
            }else{
                return $types[$type];
            }
        }
    }

    public static function name_extensions(){
        return [
            'SR' => 'SR',
            'JR' => 'JR',
            'I' => 'I',
            'II' => 'II',
            'III' => 'III',
            'IV' => 'IV',
            'V' => 'V',
        ];
    }

    public static function sex(){
        return [
            'MALE' => 'MALE',
            'FEMALE' => 'FEMALE',
        ];
    }

    public static function civil_status(){
        return [
            'Single' => 'Single',
            'Married' => 'Married',
            'Widowed' => 'Widowed',
            'Divorced' => 'Divorced',
            'Separated' => 'Separated',
        ];
    }

    public static function holiday_types(){
        return [
            'Public holiday' => 'Public holiday',
            'Regular holiday' => 'Regular holiday',
            'Special Non-working holiday' => 'Special Non-working holiday',
            'Observances' => 'Observances',
            'Office declaration' => 'Office declaration',
        ];
    }

    public static function implode_assoc($arr){
        $string = '';

        foreach ($arr as $data){
            $string = $string.$data.',';
        }
        return $string;
    }

    public static function getStingAfterChar($subject, $character){
        $whatIWant = substr($subject, strpos($subject, $character) + 1);
        return $whatIWant;
    }

    public static function departmentUnitArrayForSelect(){
        $d = \App\Models\Department::get();
        $department_array = [];
        foreach ($d as $dept){

            foreach($dept->departmentUnit as $unit){
                $department_array[$dept->name][$unit->description] = $unit->department_unit_id;
            }


        }
        foreach ($department_array  as $key=> $units) {
            ksort($department_array[$key]);
        }
        return $department_array;
    }

    public static function sexArray(){
        return [
            'Female' => 'FEMALE',
            'Male' => 'MALE',
        ];
    }

    public static  function acronym($string){
        $words = explode(" ", $string);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        return $acronym;
    }

    public static function getUserName(){
        $firstname = '';
        $middlename = '';
        $lastname = '';
        $position = '';
        if(Auth::user()->firstname == '' || Auth::user()->lastname == ''){
            if(Auth::user()->joEmployee()->exists()){
                $firstname = Auth::user()->joEmployee->firstname;
                $lastname = Auth::user()->joEmployee->lastname;
                $middlename = Auth::user()->joEmployee->middlename;
                $position = Auth::user()->joEmployee->position;
            }elseif(Auth::user()->employee()->exists()){
                $firstname = Auth::user()->employee->firstname;
                $lastname = Auth::user()->employee->lastname;
                $middlename = Auth::user()->employee->middlename;
                $position = Auth::user()->employee->position;
            }
        }else{
            $firstname = Auth::user()->firstname;
            $middlename = Auth::user()->middlename;
            $lastname = Auth::user()->lastname;
            $position = Auth::user()->position;
        }

        return [
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'position' => $position,
        ];
    }

    public static function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    public static function biometricValuesColor($val){
        $values = [
            10 => '#0073b7',
            20 => '#d76d00',
            30 => '#00a65a',
            40 => '#8eaa1d',
            50 => '#7c54f5',
            60 => '#4a24bf',
        ];

        return$values[$val];
    }

    public static function sanitizeAutonum($num){
        return str_replace(',','',$num);
    }

    public static function mis_request_nature(){
        $natures = MisRequestsNature::query()->get();
        $array = [];
        if(!empty($natures)){

            foreach ($natures as $nature){
                $array[$nature->group][$nature->nature_of_request] = $nature->slug;
            }
        }
        return $array;
    }

    public static function cropYear() {
        $cropYear = CropYear::query()->get()->sortByDesc('name');
        $array = [];
        if(!empty($cropYear)){

            foreach ($cropYear as $cY){
                $array[$cY->name]  = $cY->slug;
            }
        }
        return $array;
    }

    public static function year() {
        $year = Year::query()->get()->sortByDesc('name');
        $array = [];
        if(!empty($year)){

            foreach ($year as $y){
                $array[$y->name]  = $y->slug;
            }
        }
        return $array;
    }

    public static function yearBlockFarm() {
        $yearBlackFarm = YearBlockFarm::query()->get()->sortByDesc('name');
        $array = [];
        if(!empty($yearBlackFarm)){

            foreach ($yearBlackFarm as $yBF){
                $array[$yBF->name]  = $yBF->slug;
            }
        }
        return $array;
    }

    public static function responsibilityCenters(){
        $arr = [
            'PPSPD' => 'PPSPD',
            'AFD' => 'AFD',
            'RDE' => 'RDE',
            'REGULATION' => 'REGULATION',
            'OB' => 'OB',
            'OA' => 'OA',
            'IAD'=>'IAD',
            'LEGAL' => 'LEGAL',
        ];
        ksort($arr);
        return $arr;
    }
    public static function budgetTypes(){
        return [
            'COB' => 'COB',
            'SIDA' => 'SIDA',
        ];
    }
}