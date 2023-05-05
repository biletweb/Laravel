<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $s = $request->s;
        $posts = Post::where('content', 'LIKE', "%{$s}%")->orderBy('id', 'DESC')->paginate(9);
        return view('posts.index', compact('posts'));
    }
}
