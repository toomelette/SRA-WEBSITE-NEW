<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SidaInfrasBridge extends Model{


    public static function boot()
    {
        static::creating(function ($SidaInfrasBridge){
            $SidaInfrasBridge->user_created = Auth::user()->user_id;
            $SidaInfrasBridge->ip_created = request()->ip();
        });

        static::updating(function ($SidaInfrasBridge){
            $SidaInfrasBridge->user_updated = Auth::user()->user_id;
            $SidaInfrasBridge->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'sida_infas_bridge';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'sida_infas_bridge';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'year' => '',
        'year_slug' => '',
        'date' => null,
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
