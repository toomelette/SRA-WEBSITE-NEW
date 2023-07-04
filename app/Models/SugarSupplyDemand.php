<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SugarSupplyDemand extends Model{


    public static function boot()
    {
        parent::boot();
        static::creating(function ($sugarSupplyDemand){
            $sugarSupplyDemand->user_created = Auth::user()->user_id;
            $sugarSupplyDemand->ip_created = request()->ip();
        });

        static::updating(function ($sugarSupplyDemand){
            $sugarSupplyDemand->user_updated = Auth::user()->user_id;
            $sugarSupplyDemand->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'sugar_supply_demand';

    protected $dates = ['created_at', 'updated_at', 'date'];

    public $timestamps = true;

    protected static $logName = 'sugar_supply_demand';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'date' => null,
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
