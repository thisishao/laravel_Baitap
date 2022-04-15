<?php

namespace App\Http\Controllers\Api;

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
    public function index()
    {
        $blog = BlogModel::paginate(3);
        // dd($blog->items());
        return response()->json([
            'status'    =>  true,
            'code'      =>  200,
            'data'      =>  $blog
        ]);
    }

    public function single($id)
    {
        $blog = BlogModel::find($id);
        return response()->json([
            'status'    =>  true,
            'code'      =>  200,
            'data'      =>  $blog
        ]);
    }


    public function store(Request $request)
    {
        
    }
}
