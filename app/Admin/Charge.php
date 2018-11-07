<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = 'price_files';

    protected $fillable = ['name','link', 'status'];
}
