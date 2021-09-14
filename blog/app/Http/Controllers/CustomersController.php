<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('qlct')->get();
        return view("quanlycauthu", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view("themcauthu");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $getdata = $request->all();
        // dd($getdata);

        DB::table('qlct')->insert([
            'name'      => $request->input('name'), 
            'age'       => $request->input('age'),
            'national'  => $request->input('national'),
            'position'  => $request->input('position'),
            'salary'    => $request->input('salary')
        ]);
        echo "Thêm cầu thủ thành công";
        return redirect()->route('home');
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
    public function edit($id)
    {
        $user = DB::table('qlct')->where('id',$id)->get();
        return view("suacauthu", compact("user"));
        // dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('qlct')
              ->where('id', $id)
              ->update([              
                'name'      => $request->input('name'), 
                'age'       => $request->input('age'),
                'national'  => $request->input('national'),
                'position'  => $request->input('position'),
                'salary'    => $request->input('salary')
            ]);
        echo "<h2 style='color:red;'>Sửa cầu thủ thành công !!!<a href='/qlct'> Click</a> Vào đây để trở về trang chủ</h2>";
        // return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('qlct')->where('id', $id)->delete();
        
        echo "<h2 style='color:red;'>Xoá cầu thủ thành công !!!<a href='/qlct'> Click</a> Vào đây để trở về trang chủ</h2>";
    }
}
