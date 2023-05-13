<?php

namespace App\Http\Controllers\Post\Answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Answer\AnswerRequest;
use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(Comment $comment, AnswerRequest $request)
    {
        $data = $request->validated();
        $data['comment_id'] = $comment->id;
        $data['user_id'] = auth()->user()->id;
        Answer::query()->create($data);
        session()->flash('message', "Answer successfully added");
        return redirect()->back();
    }
}
