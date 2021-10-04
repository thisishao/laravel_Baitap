<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'country',
        'avatar',
        'remember_token',
        'level'
    ];
}
