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


    public function show()
    {
        $getAllUser = UsersModel::paginate(10);
        return view('admin.user.list', compact('getAllUser'));
    }


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


    public function destroy($id)
    {
        // $delete_User_member = UsersModel::find($id)->delete();
        // return redirect()->route('admin.user');
    }
}
