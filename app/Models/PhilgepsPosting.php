<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class PhilgepsPosting extends Model{


    public static function boot()
    {
        static::creating(function ($philgepsPosting){
            $philgepsPosting->user_created = Auth::user()->user_id;
            $philgepsPosting->ip_created = request()->ip();
        });

        static::updating(function ($philgepsPosting){
            $philgepsPosting->user_updated = Auth::user()->user_id;
            $philgepsPosting->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'philgeps_posting';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'philgepsPosting';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'crop_year_slug' => '',
        'crop_year' => '',
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
