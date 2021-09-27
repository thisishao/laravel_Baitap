<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $fillable=['title','image','description','content'];
}
