<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\UsersModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\admin\CountryModel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $country = CountryModel::all();

        return view("admin/user/profile", compact('user','country'));
        // dd(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request)
    {
        $userId = Auth::id();
        $user = UsersModel::findOrFail($userId);

        $data = $request->all();
        // dd($data);
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
}
