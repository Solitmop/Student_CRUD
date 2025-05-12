<?php

namespace App\Models;

use App\Models\FirebirdModel;

class Teachers extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'TEACHERS';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'FIO',
        'EMAIL'
    ];
}
