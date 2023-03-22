<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HRPayPlanitilla extends Model
{
    protected $table = 'hr_pay_plantilla';

    public function incumbentEmployee(){
        return $this->hasOne(Employee::class,'employee_no','employee_no');
    }

    public function occupants(){
        return $this->hasMany(HrPayPlantillaEmployees::class,'item_no','item_no')->orderBy('appointment_date','desc');
    }

    public function applicants(){
        return $this->hasMany(ApplicantPositionApplied::class,'item_no','item_no');
    }
}