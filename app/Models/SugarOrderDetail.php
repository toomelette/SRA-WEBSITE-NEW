<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class SugarOrderDetail extends Model
{
    protected $table = 'sugar_order';
    //protected $primaryKey = 'slug';
    public $timestamps = false;

    public function sugarOrder(){
        return $this->belongsTo('App\Models\SugarOrder','sugar_order_id','slug');
    }
}