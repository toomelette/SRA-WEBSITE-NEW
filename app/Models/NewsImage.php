<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class NewsImage extends Model
{
    protected $table = 'news_img';
    //protected $primaryKey = 'slug';
    public $timestamps = false;

    public function news(){
        return $this->belongsTo('App\Models\News','news_id','slug');
    }
}