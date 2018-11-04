<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = ['code', 'name', 'note'];

    public function values()
    {
        return $this->hasMany('App\Models\OptionValue', 'option_id', 'id');
    }

    public static function getValuesByCode($code)
    {
        return self::where('code', $code)->first()->values;
    }
}
