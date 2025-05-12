<?php

namespace App\Models;

use App\Models\FirebirdModel;

class Students extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'STUDENTS';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'FIO',
        'KURS',
        'GROUP_ID',
        'STATUS',
        'BIRTH_DATE',
        'ADDRESS'
    ];
}
