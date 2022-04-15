<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\ProductModel;
use App\Models\admin\Category;
use App\Models\admin\Brand;
use App\Models\admin\UsersModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllProduct = ProductModel::paginate(10);
        return view('admin.product.list', compact('getAllProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getProduct = ProductModel::find($id)->toArray();

        $getArrImage = json_decode($getProduct['image'], true);

        $getUser = UsersModel::find($getProduct['user_id'])->toArray();

        $Category = Category::find($getProduct['category_id'])->toArray();
        $Brand = Brand::find($getProduct['brand_id'])->toArray();
        // dd($Category);
        return view('admin.product.detail', compact('getProduct','getArrImage','Brand','Category','getUser'));

    }


    public function activeProduct($id)
    {
        
        $activeProduct = ProductModel::find($id);
        if($activeProduct['active'] == 0) 
        {
            $activeProduct->active = 1;
            
        }else{
            $activeProduct->active = 0;
        }
        $activeProduct->save();
        return redirect()->route('admin.product')->with('updated','Active product successfully.');
        
    }



    public function deleteProduct($id)
    {

        $getProduct = ProductModel::find($id)->toArray();

        $getArrImage = json_decode($getProduct['image'], true);
        $deleteProduct = ProductModel::find($id)->delete();
        return redirect()->route('admin.product');
    }



}
