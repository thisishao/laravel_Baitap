<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $fillable = ['name'];
}
