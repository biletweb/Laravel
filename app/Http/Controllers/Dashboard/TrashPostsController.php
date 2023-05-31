<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;

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

        \DB::beginTransaction();
        try {
            $postImages = PostImage::query()->where('post_id', $id)->get();
            Post::query()->onlyTrashed()->where('id', $id)->forceDelete();
            \DB::commit();
        } catch (\Exception) {
            \DB::rollback();
            session()->flash('error_message', "An error occurred on the server while deleting an image or post");
            return redirect()->back();
        }

        foreach ($postImages as $image) {
            Storage::disk('public')->delete($image->image);
        }

        session()->flash('message', "Post successfully delete");
        return redirect()->back();
    }
}
