<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $brand = DB::table('brand')->get();
        return view("admin/brand/brand", compact('user','brand'));
        // dd($country);
    }

    public function create()
    {
        $user = Auth::user();
        return view("admin/brand/add",compact('user'));
    }

    public function store(Request $request)
    {

        DB::table('brand')->insert(
            ['name' => $request->name ]
        );
        return redirect()->route('admin.brand');
    }
    public function destroy($id)
    {
        DB::table('brand')->where('id','=',$id)->delete();
        return back();
    }

}
