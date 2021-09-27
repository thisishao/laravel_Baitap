<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\BlogModel;
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
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
        $blog = BlogModel::all();
        $blog = BlogModel::paginate(5);
        return view("admin/blog/blog", compact('user','blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view("admin/blog/add", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $data = $request->all();
        // dd($data);
        $news = new BlogModel();
        $news->title = $data['title'];

        if ($request->hasfile('image')) {
            $file = $request->image;
            $data['image'] = $file->getClientOriginalName();
            $file->move('storage\blog\image', $file->getClientOriginalName());
        }

        $news->image = $data['image'];
        $news->description = $data['description'];
        $news->content = $data['content'];
        $news->save();

        return redirect()->route('admin.blog');
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
        $user = Auth::user();
        $blog = BlogModel::find($id);
        return view("admin/blog/edit", compact('user','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = BlogModel::findOrFail($id);

        $data = $request->all();
        $file = $request->image;

        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }


        if ($blog->update($data)) {
            if (!empty($file)) {
                $file->move('storage\blog\image', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success',__('Update Blog success'));
        }else{
            return redirect()->back()->withErrors('Update Blog errors');
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
        $blog = BlogModel::find($id);
        
        if ($blog->delete()) {
            return redirect()->back()->with('success',__('Delete blog success'));
        }else{
            return redirect()->back()->withErrors('Delete blog errors');
        }
    }
}
