<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\BlogModel;
use Illuminate\Support\Facades\Auth;
use App\Models\frontend\rateModels;
use App\Models\frontend\CommentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blog = BlogModel::all();
        $blog = BlogModel::paginate(3);
        return view('frontend.blog.blog', compact('blog'));
    }



    public function single($id)
    {
        $rate = 0;
        $blog = BlogModel::find($id);

        $previous = BlogModel::where('id', '<', $blog->id)->max('id');
        $next = BlogModel::where('id', '>', $blog->id)->min('id');

        //phần đánh giá blog
        $rateBlog = rateModels::where('blog_id','=',$id)->get();
        $countBlog = rateModels::where('blog_id','=',$id)->count();

        foreach ($rateBlog as $va) {
            $rate += $va['rate'];
        }

        if ($countBlog > 0) {
            $tbRate = round($rate/$countBlog);
        }else{
            $tbRate = 0;
            $countBlog = 0;
        }
        ///get comment blog

        $comment = CommentModel::where([
            ['blog_id','=',$id],
            ['parent_id','=',null],
        ])->get();

        $countCm = CommentModel::where('blog_id','=',$id)->count();



        return View::make('frontend.blog.blog-single')
                        ->with('previous', $previous)
                        ->with('next', $next)
                        ->with('blog', $blog)
                        ->with('tbRate', $tbRate)
                        ->with('countBlog', $countBlog)
                        ->with('comment', $comment)
                        ->with('countCm', $countCm);
    }


    public function demoApi($id)
    {
        $blog = BlogModel::find($id);
        // $blog = BlogModel::all();

        return response()->json([
            'blog' => $blog
        ]);

        // return $blog;
    }

    public function rate(Request $request)
    {
        // dd($request->all());

        $news = new rateModels();
        $news->rate = $request->rate;
        $news->blog_id= $request->blog_id;
        $news->user_id = Auth::id();
        $news->save();
        

    }

    public function comment(Request $request)
    {
        // dd($request->all());

        if (Auth::check()) {
            $comment = new CommentModel();
            $comment->user_id   = Auth::id();
            $comment->blog_id   = $request->blog_id;
            $comment->parent_id = $request->parent_id;
            $comment->comment   = $request->comment;
            $comment->save();

            return back();
        }else{
            
            return redirect()->back()->withErrors('Vui lòng đăng nhập để comment');
        }

    }

}
