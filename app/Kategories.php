<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'kategories';
    protected $fillable = ['name'];
}