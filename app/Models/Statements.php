<?php

namespace App\Models;

use App\Models\FirebirdModel;

class Statements extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'STATEMENTS';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'NUM_VEDOM',
        'GROUP_ID',
        'SEMESTR',
        'CONTROL_DATE',
        'CONTROL_ID',
        'UCH_GOD',
        'DISCIPLINE_ID',
        'TEACHER_ID'
    ];
}
