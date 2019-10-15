<?php

namespace App\Observers;

use App\Comment;
use App\BlogPost;
use Illuminate\Support\Facades\Cache;

class CommentObserver
{

    public function creating(Comment $comment)
    {
        if ($comment->commentable_type === BlogPost::class){
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget("mostCommented");
        }

    }
}
