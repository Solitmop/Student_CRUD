<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    protected $connection = 'firebird';
    protected $table = 'DISCIPLINES';
    protected $primarykey = 'ID';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'DISC_NAME'
    ];
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        
        return $this->convertEncoding($value);
    }

    public function mutateAttribute($key, $value)
    {
        return $this->convertEncoding($value);
    }

    public function newCollection(array $models = [])
    {
        return parent::newCollection($models)->map(function ($item) {
            foreach ($item->getAttributes() as $key => $value) {
                $item->setAttribute($key,$this->convertEncoding($value));
            }
            return $item;
        });
    }

    public function setAttribute($key, $value)
    {
        if (is_string($value) && mb_check_encoding($value, 'UTF-8')) {
            return iconv('UTF-8', 'Windows-1251//IGNORE//TRANSLIT', $value);
        }
        return parent::setAttribute($key, $value);
    }

    private function convertEncoding($value)
    {
        if (is_string($value) && !mb_check_encoding($value, 'UTF-8')) {
            $value = iconv('Windows-1251', 'UTF-8//IGNORE//TRANSLIT', $value);
        }
        return $value;
    }
}
