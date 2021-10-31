<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;

class MailController extends Controller
{
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
