<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quanlycauthu;
use Validator;
use App\Http\Requests\QuanLyCauThuRequest;

class QuanlycauthuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Quanlycauthu::all();
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
    public function store(QuanLyCauThuRequest $request)
    {

        $getData = $request->all();

        $news = new Quanlycauthu;
        $news->name     = $getData['name'];
        $news->age      = $getData['age'];
        $news->national = $getData['national'];
        $news->position = $getData['position'];
        $news->salary   = $getData['salary'];
        $news->save();
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Quanlycauthu::find($id);
        return view("suacauthu", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuanLyCauThuRequest $request, $id)
    {
        $user = Quanlycauthu::find($id);
        $getData = $request->all();

        $user->name     = $getData['name'];
        $user->age      = $getData['age'];
        $user->national = $getData['national'];
        $user->position = $getData['position'];
        $user->salary   = $getData['salary'];
        $user->save();

        echo "<h2 style='color:red;'>Sửa cầu thủ thành công !!!<a href='/qlct'> Click</a> Vào đây để trở về trang chủ</h2>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Quanlycauthu::find($id);

        $user->delete();

        echo "<h2 style='color:red;'>Xoá cầu thủ thành công !!!<a href='/qlct'> Click</a> Vào đây để trở về trang chủ</h2>";
    }

}
