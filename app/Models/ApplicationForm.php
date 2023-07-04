<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class ApplicationForm extends Model {

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($applicationForm){
            $applicationForm->user_created = Auth::user()->user_id;
            $applicationForm->ip_created = request()->ip();
        });

        static::updating(function ($applicationForm){
            $applicationForm->user_updated = Auth::user()->user_id;
            $applicationForm->ip_updated = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'application_form';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'application_form';
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
