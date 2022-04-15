<?php

namespace App\Models\frontend;
use App\Models\admin\Category;
use App\Models\admin\Brand;


use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $fillable = 
    [
        'name','price','user_id','category_id','brand_id','new','sale','active','company','image','detail'
    ];

    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' .$searchTerm. '%');
    }
}
