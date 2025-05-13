<?php

namespace App\Models;

use App\Models\FirebirdModel;

class Groups extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'GROUPS';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'GROUP_NAME',
        'SPECIALITY_ID'
    ];
}
