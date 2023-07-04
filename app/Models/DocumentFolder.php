<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DocumentFolder extends Model{

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

	use Sortable,LogsActivity;

    protected $table = 'rec_document_folders';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['folder_code', 'description'];

	public $timestamps = false;


    protected static $logName = 'document folder';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    protected $attributes = [
        
        'slug' => '',
        'folder_code' => '',
        'description' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',


    ];


    public function documents1(){
        return $this->hasMany('App\Models\Document','folder_code','folder_code');
    }

    public function documents2(){
        return $this->hasMany('App\Models\Document','folder_code2','folder_code');
    }
    
}
