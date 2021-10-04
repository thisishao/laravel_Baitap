<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\BlogModel;
use Illuminate\Support\Facades\Auth;
use App\Models\frontend\rateModels;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = BlogModel::all();
        $blog = BlogModel::paginate(3);
        return view('frontend.blog.blog', compact('blog'));
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
        //
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
        //
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

    public function single($id)
    {
        $rate = 0;
        $blog = BlogModel::find($id);
        // return $blog;
        $rateBlog = rateModels::where('blog_id','=',$id)->get();
        $countBlog = rateModels::where('blog_id','=',$id)->count();

        foreach ($rateBlog as $va) {
            $rate += $va['rate'];
        }

        if ($countBlog > 0) {
            $tb = round($rate/$countBlog);
        }else{
            $tb = 0;
            $countBlog = 0;
        }

        // dd($rateBlog);
        return view('frontend.blog.blog-single',compact('blog','tb','countBlog'));
    }

    public function next($id)
    {
        $blognext = BlogModel::where('id','>',$id)->limit(1)->get();

        $blogs = [];
        foreach ($blognext as $va) {
            $blogs['id'] =  $va['id'] ;
        }
        $blog = BlogModel::find($blogs['id']);
        return view('frontend.blog.blog-single',compact('blog'));

        // SELECT * FROM `blog` WHERE id=(SELECT MAX(id) FROM `blog`
        // max row


    }

    public function pre($id)
    {
        $blognext = BlogModel::where('id','<',$id)->orderByDesc('id')->limit(1)->get();

        $blogs = [];
        foreach ($blognext as $va) {
            $blogs['id'] =  $va['id'] ;
        }

        $blog = BlogModel::find($blogs['id']);

        return view('frontend.blog.blog-single',compact('blog'));
        return redirect()->route('frontend.blog.blog-single');

        // SELECT * FROM `blog` WHERE id=(SELECT MIN(id) FROM `blog`)
    }

    public function demoApi($id)
    {
        $blog = BlogModel::find($id);
        // $blog = BlogModel::all();

        return response()->json($blog);

        // return $blog;
    }
    public function rate(Request $request)
    {
        // dd($request->all());

        $news = new rateModels();
        $news->rate = $request->rate;
        $news->blog_id= $request->blog_id;
        $news->user_id = $request->user_id;
        $news->save();
        

    }

}
