<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $post = Post::create($data);

        if (isset($data['image'])) {
            $images = $data['image'];
            foreach ($images as $image) {
                $postImage = Storage::disk('public')->put('disc/img/post', $image);
                PostImage::query()->create(['image' => $postImage, 'post_id' => $post->id]);
            }
        }

        session()->flash('message', "Post successfully create");
        return redirect()->route('posts.index');
    }
}
