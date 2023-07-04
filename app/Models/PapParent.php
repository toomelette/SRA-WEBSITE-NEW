<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PapParent extends Model{

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($pap_parent){
            $pap_parent->user_created = Auth::user()->user_id;
            $pap_parent->ip_created = request()->ip();
        });

        static::updating(function ($pap_parent){
            $pap_parent->user_updated = Auth::user()->user_id;
            $pap_parent->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'pap_parents';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'pap_parents';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;



    protected $attributes = [
        'slug' => '',
        'name' => '',
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];





    /** RELATIONSHIPS **/
    public function user() {
        return $this->belongsTo('App\Models\User','user_id','user_id');
    }




    public function submenu() {
        return $this->hasMany('App\Models\Submenu','menu_id','menu_id');
    }
}