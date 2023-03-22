<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SuOptions extends Model
{
    protected $table = 'su_options';

    public static function employeeApptStatus(){
        return SuOptions::query()->where('for','=','employee_appointment_status')->get();
    }

    public static function employeeStatus(){
        return SuOptions::query()->where('for','=','employee_status')->get();
    }

    public static function employeeGroupings(){
        return SuOptions::query()->where('for','=','employee_groupings')->get();
    }


}