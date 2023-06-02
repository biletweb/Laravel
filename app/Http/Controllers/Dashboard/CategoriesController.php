<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $categories = Category::withTrashed()->get();
        return view('dashboard.categories', compact('categories'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', auth()->user());
        $data = $request->validate([
            'title' => 'required|string|max:255'
        ]);
        Category::query()->create($data);
        session()->flash('message', "Category successfully create");
        return redirect()->back();
    }

    public function restore($id)
    {
        $this->authorize('restore', auth()->user());
        \DB::beginTransaction();
        try {
            Category::query()->onlyTrashed()->where('id', $id)->update(['deleted_at' => null]);
            Post::query()->onlyTrashed()->where('category_id', $id)->update(['deleted_at' => null]);
            \DB::commit();
        } catch (\Exception) {
            \DB::rollback();
            session()->flash('error_message', "Unable to restore category");
            return redirect()->back();
        }
        session()->flash('message', "Category successfully restore");
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->authorize('delete', auth()->user());
        \DB::beginTransaction();
        try {
            Category::query()->where('id', $id)->delete();
            Post::query()->where('category_id', $id)->delete();
            \DB::commit();
        } catch (\Exception) {
            \DB::rollback();
            session()->flash('error_message', "Failed to archive category");
            return redirect()->back();
        }
        session()->flash('message', "The category has been successfully archived");
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', auth()->user());
        \DB::beginTransaction();
        try {
            $postImages = PostImage::query()->join('posts', 'posts.id', '=', 'post_images.post_id')->where('posts.deleted_at', '!=', null)->get();
            Category::query()->onlyTrashed()->where('id', $id)->forceDelete();
            Post::query()->onlyTrashed()->where('category_id', $id)->forceDelete();
            \DB::commit();
        } catch (\Exception) {
            \DB::rollback();
            session()->flash('error_message', "Failed to deleted category");
            return redirect()->back();
        }
        foreach ($postImages as $image) {

            Storage::disk('public')->delete($image->image);
        }
        session()->flash('message', "Category successfully deleted");
        return redirect()->back();
    }
}
