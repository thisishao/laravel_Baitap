<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class rateModels extends Model
{
    protected $table = 'rate';

    protected $fillable = [
        'id',
        'rate',
        'blog_id',
        'user_id'
    ];
}
