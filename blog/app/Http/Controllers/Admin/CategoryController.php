<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $category = DB::table('category')->get();
        return view("admin/category/category", compact('user','category'));
        // dd($country);
    }

    public function create()
    {
        $user = Auth::user();
        return view("admin/category/add",compact('user'));
    }

    public function store(Request $request)
    {

        DB::table('category')->insert(
            ['name' => $request->name ]
        );
        return redirect()->route('admin.category');
    }
    public function destroy($id)
    {
        DB::table('category')->where('id','=',$id)->delete();
        return back();
    }
}
