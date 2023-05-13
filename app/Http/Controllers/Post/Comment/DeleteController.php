<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', auth()->user());
        $comment->delete();
        session()->flash('message', "Comment successfully delete");
        return redirect()->back();
    }
}
