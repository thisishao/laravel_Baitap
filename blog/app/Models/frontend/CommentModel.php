<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\UsersModel;

class CommentModel extends Model
{
    protected $table = 'comment';

    protected $fillable = 
    [
        'user_id',
        'blog_id',
        'parent_id',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentModel::class, 'parent_id');
    }
}
