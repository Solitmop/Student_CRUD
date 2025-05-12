<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirebirdModel extends Model
{
    protected function asUtf8($value)
    {
        return is_string($value)
            ? mb_convert_encoding($value, 'UTF-8', 'WINDOWS-1251')
            : $value;
    }

    public function toArray()
    {
        $array = parent::toArray();
        array_walk_recursive($array, function (&$v) {
            $v = $this->asUtf8($v);
        });
        return $array;
    }

    

    public function save(array $options = [])
    {
        // Преобразуем входящие данные в WIN1251 перед сохранением
        $this->attributes = $this->convertAttributesToWin1251($this->attributes);
        
        return parent::save($options);
    }

    public function getKeyName()
    {
        return 'ID';
    }

    protected function convertAttributesToWin1251(array $attributes)
    {
        return collect($attributes)->map(function ($value) {
            if (is_string($value) && mb_check_encoding($value, 'UTF-8')) {
                return iconv('UTF-8', 'Windows-1251//IGNORE//TRANSLIT', $value);
            }
            return $value;
        })->all();
    }

}
