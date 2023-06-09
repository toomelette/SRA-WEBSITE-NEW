<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Document extends Model{

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

	use Sortable, LogsActivity;

    protected $table = 'rec_documents';

    protected $dates = ['date', 'created_at', 'updated_at'];

    public $sortable = ['reference_no', 'date', 'person_to', 'person_from', 'subject'];

	public $timestamps = false;

    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;




    protected $attributes = [
        
        'slug' => '',
        'document_id' => '',
        'folder_code' => '',
        'folder_code2' => '',
        'reference_no' => '',
        'date' => null,
        'person_to' => '',
        'person_from' => '',
        'type' => '',
        'subject' => '',
        'category' => '',
        'filename' => '',
        'year' => null,
        'remarks' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];

    

    // Relationships

    public function documentDisseminationLogAll(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'document_id', 'document_id');
    }

    public function documentDisseminationLog(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'document_id', 'document_id')->whereNull('send_copy');
    }


    public function documentDisseminationLogSendCopy(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'document_id', 'document_id')->where('send_copy','=', 1);
    }


}
