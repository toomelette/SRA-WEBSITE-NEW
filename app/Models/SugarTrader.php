<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SugarTrader extends Model{


    public static function boot()
    {
//        static::creating(function ($navigation){
//            $navigation->user_created = Auth::user()->user_id;
//            $navigation->ip_created = request()->ip();
//        });
//
//        static::updating(function ($navigation){
//            $navigation->user_updated = Auth::user()->user_id;
//            $navigation->ip_updated = request()->ip();
//        });
    }
    
    use Sortable, LogsActivity;

    protected $table = 'sugar_trader';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'sugar_trader';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    protected $attributes = [
        'slug' => '',
        'business_name' => '',
        'business_address' => '',
        'contact_person' => '',
        'email' => '',
        'trader_type' => '',
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',
    ];

}
