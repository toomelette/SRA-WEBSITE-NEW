<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class MemorandumCircular extends Model {


    public static function boot()
    {
        static::creating(function ($memorandumCircular){
            $memorandumCircular->user_created = Auth::user()->user_id;
            $memorandumCircular->ip_created = request()->ip();
        });

        static::updating(function ($memorandumCircular){
            $memorandumCircular->user_updated = Auth::user()->user_id;
            $memorandumCircular->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'memorandum_circular';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'memorandum_circular';
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
