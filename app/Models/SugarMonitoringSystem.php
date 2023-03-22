<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SugarMonitoringSystem extends Model {


    public static function boot()
    {
        static::creating(function ($sugarMonitoringSystem){
            $sugarMonitoringSystem->user_created = Auth::user()->user_id;
            $sugarMonitoringSystem->ip_created = request()->ip();
        });

        static::updating(function ($sugarMonitoringSystem){
            $sugarMonitoringSystem->user_updated = Auth::user()->user_id;
            $sugarMonitoringSystem->ip_updated = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'sugar_monitoring_system';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'sugar_monitoring_system';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
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
