<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SubNav extends Model{
	

    public static function boot()
    {
        parent::boot();
        static::updating(function($subnav){
            $subnav->user_updated = Auth::user()->user_id;
            $subnav->ip_updated = request()->ip();
        });

        static::creating(function ($subnav){
            $subnav->user_created = Auth::user()->user_id;
            $subnav->ip_created = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'sub_nav';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['name'];

    public $timestamps = true;

    protected static $logName = 'subnav';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;



    /** RELATIONSHIPS **/
    public function navigation() {
    	return $this->belongsTo('App\Models\Navigation','nav_main_id','nav_main_id');
   	}







}
