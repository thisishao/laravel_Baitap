<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $fillable = ['name','email ','password','phone','address','country','avatar'];

}
