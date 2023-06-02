<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Awssat\Visits\Visits;


class Visitors extends Model
{

    protected $table = 'visitors';
    public $timestamps = false;
}