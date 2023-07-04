<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class News extends Model{


    public static function boot()
    {
        parent::boot();
        static::creating(function ($navigation){
            $navigation->user_created = Auth::user()->user_id;
            $navigation->ip_created = request()->ip();
        });

        static::updating(function ($navigation){
            $navigation->user_updated = Auth::user()->user_id;
            $navigation->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'news';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'news';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [

        'slug' => '',
        'title' => '',
        'description' => '',
        'date' => null,
        'date_start' => null,
        'date_end' => null,
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];

    public function newsImage() {
        return $this->hasMany(NewsImage::class, 'news_id', 'slug');
    }




//    /** RELATIONSHIPS **/
//    public function user() {
//    	return $this->belongsTo('App\Models\User','user_id','user_id');
//   	}



//    public function subnav() {
//    	return $this->hasMany('App\Models\SubNav','nav_main_id','nav_main_id');
//   	}

    





}
