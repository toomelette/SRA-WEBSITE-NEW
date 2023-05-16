<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class StkDirectoryMDDC_MDOS extends Model{


    public static function boot()
    {
        static::creating(function ($station){
            $station->user_created = Auth::user()->user_id;
            $station->ip_created = request()->ip();
        });

        static::updating(function ($station){
            $station->user_updated = Auth::user()->user_id;
            $station->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'stk_directory_mddc_mdos';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'stk_directory_mddc_mdos';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'year_slug' => '',
        'year' => '',
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
