<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id)
    {
        $posts = Post::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(9);
        return view('posts.index', compact('posts'));
    }
}
