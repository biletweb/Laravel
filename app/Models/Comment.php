<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('id', 'DESC');
    }

    public function post()
    {
        return $this->belongsTo(Post::class)->withTrashed(); // withTrashed для отображения всех коммент. в профиле польз.
    }
}
