<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class BlockFarmEstablishedVisayas extends Model{


    public static function boot()
    {
        parent::boot();
        static::creating(function ($blockfarm){
            $blockfarm->user_created = Auth::user()->user_id;
            $blockfarm->ip_created = request()->ip();
        });

        static::updating(function ($blockfarm){
            $blockfarm->user_updated = Auth::user()->user_id;
            $blockfarm->ip_updated = request()->ip();
        });
    }


    use Sortable, LogsActivity;

    protected $table = 'block_farm_established_visayas';

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected static $logName = 'block_farm_established_visayas';
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


