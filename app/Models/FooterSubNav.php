<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class FooterSubNav extends Model{
	

    public static function boot()
    {
        parent::boot();
        static::updating(function($footerSubNav){
            $footerSubNav->user_updated = Auth::user()->user_id;
            $footerSubNav->ip_updated = request()->ip();
        });

        static::creating(function ($footerSubNav){
            $footerSubNav->user_created = Auth::user()->user_id;
            $footerSubNav->ip_created = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'footer_sub_nav';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['name'];

    public $timestamps = true;

    protected static $logName = 'footerSubNav';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;



    /** RELATIONSHIPS **/
    public function footerNavigation() {
    	return $this->belongsTo('App\Models\FooterNavigation','footer_nav_id','footer_nav_id');
   	}







}
