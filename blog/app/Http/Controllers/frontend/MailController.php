<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\frontend\MemberRequest;
use App\Models\frontend\MemberModel;
use Mail;
use App\User;


class MailController extends Controller
{
    public function order()
    {
        $cart = Session::get('cart');
        $total = 0;
        return view('frontend.cart.order', compact('cart', 'total'));
    }

    public function store(MemberRequest $request){


        $cart = Session::get('cart');
        $count = count($cart);
        $total = 0;

        $data = $request->all();
        $user = new MemberModel;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->level = 0;
        $user->save();


        $login = [
            'email'     => $request->email,
            'password'  => $request->password,
            'level'     => 0
        ];

        $remember = false;

        if (Auth::attempt($login, $remember)) {
            
            return redirect()->route('frontend.testmail');
        }

    }

    public function sendMail()
    {
        $auth = Auth::user();
        $cart = Session::get('cart');
        $count = count($cart);
        $total = 0;

        Mail::send('frontend.sendMail.email', compact('cart','auth','count','total'), function($email) use($auth){
            $email->subject('Đơn hàng đã sẵn sàng để giao đến quý khách');
            $email->to($auth->email, $auth->name);
        });
        Session::forget('cart');
        return redirect()->route('frontend.mail.done');
    }

    public function done()
    {

        return view('frontend.sendMail.thanhcong');
    }
}
