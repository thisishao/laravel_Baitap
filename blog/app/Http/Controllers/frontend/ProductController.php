<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Category;
use App\Models\admin\Brand;
use App\Http\Requests\frontend\ProductRequest;
use Image;


class ProductController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $product = ProductModel::where('user_id',$id)->get();

        return view('frontend.product.product', compact('product'));
    }


    public function create()
    {
        $cat    = Category::all();
        $brand  = Brand::all();
        return view('frontend.product.add', compact('cat','brand'));
    }


    public function store(ProductRequest $request)
    {


        $idUser = Auth::id();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('His_dmY_');
        $dir = "upload/product/".$idUser."/";
        

        if($request->hasfile('filename'))
        {

            $coutImg = count($request->file('filename'));

            if ($coutImg > 3) {
                return back()->withErrors('Vui lòng chọn từ 1 đến 3 ảnh');
            }else{

                if (!file_exists($dir)) {
                    mkdir($dir);
                }

                    foreach($request->file('filename') as $image)
                    {

                        $name   = $date.$image->getClientOriginalName();
                        $name_2 = "hinhnho_".$date.$image->getClientOriginalName();
                        $name_3 = "hinhvua_".$date.$image->getClientOriginalName();
                        
                        $path   = public_path($dir . $name);
                        $path2  = public_path($dir . $name_2);
                        $path3  = public_path($dir . $name_3);

                        Image::make($image->getRealPath())->save($path);
                        Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                        Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                        
                        $data[] = $name;

                    }



                    // print_r($data);
                    //  ($request->all());

                    $news = new ProductModel();
                    $news->name     = $request->name;
                    $news->price    = $request->price;
                    $news->user_id  = $idUser;
                    $news->category_id = $request->category;
                    $news->brand_id    = $request->brand;

                    $news->active = $request->active;
                    if ($request->new == 1) {
                        $news->new = 1;

                        if (empty($request->sale)) {
                            return redirect()->back()->withErrors('Vui lòng chọn giá sale');
                            $news->sale = $request->sale;
                        }
                        $news->sale = $request->sale;
                    }else{

                        $news->new = 0;
                        $news->sale = null;
                    }
                    
                    $news->company = $request->company;
                    $news->detail  = $request->detail;
                    $news->image   = json_encode($data);

                    $news->save();

                    return redirect()->route('frontend.product');

            }


        }
        
    }


    public function edit($id)
    {
        $cat        = Category::all();
        $brands     = Brand::all();
        $idUser     = Auth::id();

        $getProducts    = ProductModel::find($id)->toArray();

        $getArrImage    = json_decode($getProducts['image'], true);
        // dd($getArrImage);

        return view('frontend.product.edit', compact('cat','brands','getProducts','getArrImage','idUser'));

    }


    public function update(ProductRequest $request, $id)
    {
        $idUser = Auth::id();


        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('His_dmY_');
        $dir = "upload/product/".$idUser."/";

        $getProducts    = ProductModel::find($id)->toArray();
        $getArrImage    = json_decode($getProducts['image'], true);


        foreach ($getArrImage as $va) {
            $getData[] = $va;
        }

        // Get array xóa hinh ảnh cũ của product
        if ($request->demo) {
            $getDelImg = $request->demo;
            $data = array_diff($getData, $getDelImg);
        }else{
            $data = $getData;
        }

        if ($request->hasfile('filename')) {

            $countFile = count($request->file('filename'));
            $countImg = count($data) + $countFile;
            // echo $countImg;

            if ($countImg > 3) {
                return back()->withErrors('Vui lòng chọn từ 1 đến 3 ảnh để update');
            }else{

                foreach($request->file('filename') as $image)
                {
                    $name   = $date.$image->getClientOriginalName();
                    $name_2 = "hinhnho_".$date.$image->getClientOriginalName();
                    $name_3 = "hinhvua_".$date.$image->getClientOriginalName();
                    
                    $path   = public_path($dir . $name);
                    $path2  = public_path($dir . $name_2);
                    $path3  = public_path($dir . $name_3);

                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                    Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                    
                    $data[] = $name;

                }
            }
        }

        if (empty($data)) {
            return back()->withErrors('Vui lòng chọn từ 1 đến 3 ảnh để update');
        }
        
        
        $news = ProductModel::findOrFail($id);

        $news->name     = $request->name;
        $news->price    = $request->price;
        $news->user_id  = $idUser;
        $news->category_id = $request->category;
        $news->brand_id    = $request->brand;
        $news->active = $request->active;
        if ($request->new == 1) {
            $news->new = 1;

            if (empty($request->sale)) {
                return redirect()->back()->withErrors('Vui lòng chọn giá sale');  
            }

            $news->sale = $request->sale;
        }else{
            $news->new = 0;
            $news->sale = null;
        }
                    
        $news->company = $request->company;
        $news->detail  = $request->detail;
        $news->image   = json_encode($data);

        $news->save();

        return redirect()->back()->with('success',__('Update product success'));

    }


    public function destroy($id)
    {

        $product = ProductModel::findOrFail($id);
               
        if ($product->delete()) {
            return redirect()->back()->with('success',__('Delete product success'));
        }else{
            return redirect()->back()->withErrors('Delete product errors');
        }
    }

    public function details($id)
    {
        $product = ProductModel::findOrFail($id);
        $getProducts    = ProductModel::find($id)->toArray();

        $getArrImage    = json_decode($getProducts['image'], true);

        $image = reset($getArrImage);

        return view('frontend.product.details', compact('product','getArrImage','image'));
    }


    public function productBrand($id)
    {
        $getAllProduct = ProductModel::where('brand_id',$id)->where('active', 0)->get()->toArray();
        return view('frontend.product.brand',compact('getAllProduct'));  
    }


    public function productCategory($id)
    {
        $getAllProduct = ProductModel::where('category_id',$id)->where('active', 0)->get()->toArray();
        return view('frontend.product.category',compact('getAllProduct'));      
    }


}
