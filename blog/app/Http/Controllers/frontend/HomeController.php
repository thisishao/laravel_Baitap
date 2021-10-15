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
        $product = ProductModel::orderByDesc('created_at')->limit(6)->get();
        // dd($product);

        return view('frontend.index', compact('product'));
    }
}
