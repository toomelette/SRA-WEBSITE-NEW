<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class SugarcaneVarietiesImage extends Model
{
    protected $table = 'sugarcane_varieties_img';
    //protected $primaryKey = 'slug';
    public $timestamps = false;

    public function sugarcaneVarieties(){
        return $this->belongsTo('App\Models\SugarcaneVarieties','sugarcane_varieties_id','slug');
    }
}