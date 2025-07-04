<?php

namespace App\Models;

use App\Models\FirebirdModel;

class ControlTypes extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'CONTROL_TYPES';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'CONTROL_NAME'
    ];
}
