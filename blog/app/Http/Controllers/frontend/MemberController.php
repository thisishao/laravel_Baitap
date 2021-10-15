<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\MemberRequest;
use App\Models\admin\CountryModel;
use App\Models\frontend\MemberModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\MemberLoginRequest;
use App\Http\Requests\frontend\MemberUpdateRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('frontend.member.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.member.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $user = new MemberModel;

        if ($data['password'] != $data['cf_pwd']) {
            return redirect()->back()->withErrors('Nhập lại mật khẩu không chính xác');
        }else{

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->level = 0;
            $user->save();
        }
        return redirect()->route('frontend.blog');
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
    public function edit()
    {
        $user = Auth::user();
        $country = CountryModel::all();
        return view('frontend.member.account', compact('user','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $user = MemberModel::findOrFail(Auth::id());

        $file = $request->avatar;

        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }

        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('storage\user\avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success',__('Update profile success'));
        }else{
            return redirect()->back()->withErrors('Update profile errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(MemberLoginRequest $request)
    {

        $login = [
            'email'     => $request->email,
            'password'  => $request->password,
            'level'     => 0
        ];

        $remember = false;

        if ($request->remember) {
            $remember = true;
        }

        if (Auth::attempt($login, $remember)) {
            return redirect()->route('frontend.blog');
        }else{
            return redirect()->back()->withErrors('Email or password is not correct');
        }

        // dd($request->all());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('frontend.login');
    }
}
