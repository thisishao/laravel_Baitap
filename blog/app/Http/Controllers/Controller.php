<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\frontend\ProductModel;
use App\Models\admin\Category;
use App\Models\admin\Brand;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        $getCategory = Category::all()->toArray();
        $getBrand = Brand::all()->toArray();

        View::share('getCategory', $getCategory);
        View::share('getBrand', $getBrand);
    }
}

    


