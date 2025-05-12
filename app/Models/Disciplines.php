<?php

namespace App\Models;

use App\Models\FirebirdModel;

class Disciplines extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'DISCIPLINES';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'DISC_NAME'
    ];
}
