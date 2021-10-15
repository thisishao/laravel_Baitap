<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\ProductModel;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Category;
use App\Models\admin\Brand;
use App\Http\Requests\frontend\ProductRequest;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $product = ProductModel::where('user_id',$id)->get();

        return view('frontend.product.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat    = Category::all();
        $brand  = Brand::all();
        return view('frontend.product.add', compact('cat','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $id = Auth::id();
        // $count = count($request->file('filename'));
        if($request->hasfile('filename'))
        {
            $coutImg = count($request->file('filename'));
            echo $coutImg;
            if ($coutImg > 3) {
                return back()->withErrors('Vui lòng chọn từ 1 đến 3 ảnh');
            }else{

                foreach($request->file('filename') as $image)
                {

                    $name   = $image->getClientOriginalName();
                    $name_2 = "2".$image->getClientOriginalName();
                    $name_3 = "3".$image->getClientOriginalName();
                    
                    $path   = public_path('upload/product/' . $name);
                    $path2  = public_path('upload/product/' . $name_2);
                    $path3  = public_path('upload/product/' . $name_3);

                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                    Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                    
                    $data[] = $name;

                }
                    // print_r($data);
                    // dd($request->all());

                    $news = new ProductModel();
                    $news->name     = $request->name;
                    $news->price    = $request->price;
                    $news->user_id  = $id;
                    $news->category_id = $request->category;
                    $news->brand_id    = $request->brand;

                    if ($request->new == 1) {
                        $news->new = 1;

                        if (empty($request->sale)) {
                            return redirect()->back()->withErrors('Vui lòng chọn giá sale');
                            $news->sale = $request->sale;
                        }
                        $news->sale = $request->sale;
                    }else{
                        $news->new = 0;
                    }
                    
                    $news->company = $request->company;
                    $news->detail  = $request->detail;
                    $news->image   = json_encode($data);

                    $news->save();

                    return redirect()->route('frontend.product');

            }


        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat        = Category::all();
        $brands     = Brand::all();

        $getProducts    = ProductModel::find($id)->toArray();
        // $gets        = ProductModel::find($id);
        $getArrImage    = json_decode($getProducts['image'], true);
        // dd($getProducts);

        return view('frontend.product.edit', compact('cat','brands','getProducts','getArrImage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $idUser = Auth::id();

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

                    $name   = $image->getClientOriginalName();
                    $name_2 = "2".$image->getClientOriginalName();
                    $name_3 = "3".$image->getClientOriginalName();
                    
                    $path   = public_path('upload/product/' . $name);
                    $path2  = public_path('upload/product/' . $name_2);
                    $path3  = public_path('upload/product/' . $name_3);

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
        
        
        $news = ProductModel::find($id);

        $news->name     = $request->name;
        $news->price    = $request->price;
        $news->user_id  = $idUser;
        $news->category_id = $request->category;
        $news->brand_id    = $request->brand;

        if ($request->new == 1) {
            $news->new = 1;

            if (empty($request->sale)) {
                return redirect()->back()->withErrors('Vui lòng chọn giá sale');  
            }

            $news->sale = $request->sale;
        }else{
            $news->new = 0;
        }
                    
        $news->company = $request->company;
        $news->detail  = $request->detail;
        $news->image   = json_encode($data);

        $news->save();

        return redirect()->back()->with('success',__('Update product success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = ProductModel::findOrFail($id);
               
        if ($product->delete()) {
            return redirect()->back()->with('success',__('Delete product success'));
        }else{
            return redirect()->back()->withErrors('Delete product errors');
        }
    }
}
