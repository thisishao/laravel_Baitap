<?php

namespace App\Models\admin;
use App\Models\frontend\ProductModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(ProductModel::class,'category_id','id');
    }
}
