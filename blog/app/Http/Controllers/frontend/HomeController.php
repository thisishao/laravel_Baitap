<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\ProductModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = ProductModel::orderByDesc('created_at')->where('active', 0)->limit(6)->get();
        // dd($product);

        return view('frontend.index', compact('product'));
    }
    public function SearchProductByPrice(Request $request)
    {
        $getPrice = $request->getPrice;
        $priceExplode =  explode(',', $getPrice);

        $result = ProductModel::whereBetween('price', [$priceExplode[0], $priceExplode[1]])->where('active', 0)->get()->toArray();
        if (!empty($result)) {
            return response()->json(['result'=>$result]);
        } else{
            return 0;
        }
    }

    public function SearchProduct(Request $request)
    {
        $search_content = $request->search_content;
        $result = ProductModel::search($search_content)->where('active', 0)->get()->toArray();

        return view('frontend.product.result', compact('result'));
    }
}
