<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\frontend\ProductModel;
use Mail;

class CartController extends Controller
{


    public function store(Request $request)
    {
        $id = $request->id;
        $product = ProductModel::findOrFail($id);  
        $cart = Session::get('cart');

        $pro = array(
            "id" => $product->id,
            "user_id" => $product->user_id,
            "name" => $product->name,
            "price" => $product->price,
            "sale" =>  $product->sale,
            "image" => $product->image,
            "qty" => 1,
        );


        if (isset($cart[$id])) {
            $qty = $cart[$id]["qty"];
            $qty = $qty + 1;
            $cart[$id]["qty"] = $qty;
        }else{
            $cart[$id] = $pro;
        }

        Session(['cart' => $cart]);
        $count = count($cart);
        // print_r($cart);
        return response()->json(['success'=>'Thêm vào giỏ hàng thành công.']);
    }


    public function show()
    {
        $cart = Session::get('cart');
        // dd($cart);
        $total = 0;

        return view('frontend.cart.cart', compact('cart','total'));
    }


    public function update(Request $request)
    {
        $cart = Session::get('cart');

        if ($request->cong) {
            $id = $request->cong;
            $qty = $cart[$id]["qty"];
            $qty = $qty + 1;
            $cart[$id]["qty"] = $qty;
        };

        if ($request->tru) {
            $id = $request->tru;
            $qty = $cart[$id]["qty"];
            $qty = $qty - 1;
            $cart[$id]["qty"] = $qty;

            if ($cart[$id]["qty"] == 0) {       
                unset($cart[$id]);
            };

        };


        if ($request->remove) {
            $id = $request->remove;
            unset($cart[$id]);
            // return $cart;
        };

        Session(['cart' => $cart]);
    }



}
