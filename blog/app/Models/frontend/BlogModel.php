<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $fillable=['title','image','description','content'];

    public function comments()
    {
        return $this->hasMany(CommentModel::class)->whereNull('parent_id');
    }
}
