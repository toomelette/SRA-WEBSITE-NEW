<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class FundUtilization extends Model{


    public static function boot()
    {
        static::creating(function ($funUtilization){
            $funUtilization->user_created = Auth::user()->user_id;
            $funUtilization->ip_created = request()->ip();
        });

        static::updating(function ($funUtilization){
            $funUtilization->user_updated = Auth::user()->user_id;
            $funUtilization->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'fund_utilization';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'fund_utilization';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'crop_year_slug' => '',
        'crop_year' => '',
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