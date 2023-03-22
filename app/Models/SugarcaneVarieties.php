<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;


class SugarcaneVarieties extends Model {


    public static function boot()
    {
        static::creating(function ($sugarcaneVarieties){
            $sugarcaneVarieties->user_created = Auth::user()->user_id;
            $sugarcaneVarieties->ip_created = request()->ip();
        });

        static::updating(function ($sugarcaneVarieties){
            $sugarcaneVarieties->user_updated = Auth::user()->user_id;
            $sugarcaneVarieties->ip_updated = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'sugarcane_varieties';

    protected $dates = ['created_at', 'updated_at'];
    
	public $timestamps = true;

    protected static $logName = 'sugarcane_varieties';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;


    protected $attributes = [
        'slug' => '',
        'name' => '',
        'description' => '',
        'habit_of_growth' => '',
        'flowering' => '',
        'leaf_characteristics' => '',
        'stalk_characteristics' => '',
        'yield_potential' => '',
        'reaction_to_disease' => '',
        'remarks' => '',
        'created_at' => null,
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',
    ];

}
