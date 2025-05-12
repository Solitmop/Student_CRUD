<?php

namespace App\Models;

use App\Models\FirebirdModel;

class MarkTypes extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'MARK_TYPES';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'MARK_VALUE',
        'MARK_NAME'
    ];
}
