<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class BioEnergy extends Model{


    public static function boot()
    {
        static::creating(function ($bioEnergy){
            $bioEnergy->user_created = Auth::user()->user_id;
            $bioEnergy->ip_created = request()->ip();
        });

        static::updating(function ($bioEnergy){
            $bioEnergy->user_updated = Auth::user()->user_id;
            $bioEnergy->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'bio_energy';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'bio_energy';
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