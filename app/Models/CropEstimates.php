<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class CropEstimates extends Model{

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($cropEstimates){
            $cropEstimates->user_created = Auth::user()->user_id;
            $cropEstimates->ip_created = request()->ip();
        });

        static::updating(function ($cropEstimates){
            $cropEstimates->user_updated = Auth::user()->user_id;
            $cropEstimates->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'crop_estimates_statistics';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'crop_estimates_statistics';
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


