<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class FooterNavigation extends Model{


    public static function boot()
    {
        static::creating(function ($footerNavigation){
            $footerNavigation->user_created = Auth::user()->user_id;
            $footerNavigation->ip_created = request()->ip();
        });

        static::updating(function ($footerNavigation){
            $footerNavigation->user_updated = Auth::user()->user_id;
            $footerNavigation->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'footer_nav';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'footerNavigation';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;



    protected $attributes = [

        'slug' => '',
        'name' => '',
        'is_main' => '',
        'is_active' => '',
        'sequence' => '',
        'route' => '',
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];





//    /** RELATIONSHIPS **/
//    public function user() {
//    	return $this->belongsTo('App\Models\User','user_id','user_id');
//   	}




    public function footersubnav() {
    	return $this->hasMany('App\Models\FooterSubNav','footer_nav_slug','footer_nav_slug');
   	}

    





}
