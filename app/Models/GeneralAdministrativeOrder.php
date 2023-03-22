<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class GeneralAdministrativeOrder extends Model {


    public static function boot()
    {
        static::creating(function ($generalAdministrativeOrder){
            $generalAdministrativeOrder->user_created = Auth::user()->user_id;
            $generalAdministrativeOrder->ip_created = request()->ip();
        });

        static::updating(function ($generalAdministrativeOrder){
            $generalAdministrativeOrder->user_updated = Auth::user()->user_id;
            $generalAdministrativeOrder->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'general_administrative_order';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'general_administrative_order';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'year' => '',
        'file_title' => '',
        'title' => '',
        'path' => '',
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',
    ];

}
