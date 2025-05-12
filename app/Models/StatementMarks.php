<?php

namespace App\Models;

use App\Models\FirebirdModel;

class StatementMarks extends FirebirdModel
{
    protected $connection = 'firebird';
    protected $table = 'STATEMENT_MARKS';
    protected $primarykey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'STUD_ID',
        'STATEMENT_ID',
        'MARK_ID',
    ];
}
