<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PriceFile extends Model
{
    protected $table = 'price_files';

    protected $fillable = ['name', 'link'];

}
