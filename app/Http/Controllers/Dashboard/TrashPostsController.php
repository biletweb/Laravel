<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;

class TrashPostsController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $posts = Post::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.trash', compact('posts'));
    }

    public function restore($id)
    {
        $this->authorize('restore', auth()->user());
        Post::query()->onlyTrashed()->where('id', $id)->update(['deleted_at' => null]);
        session()->flash('message', "Post successfully restore");
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->authorize('forceDelete', auth()->user());
        Post::query()->onlyTrashed()->where('id', $id)->forceDelete();
        session()->flash('message', "Post successfully delete");
        return redirect()->back();
    }
}
