<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\BlogPost;
use App\Events\CommentPosted as AppCommentPosted;
use App\Http\Resources\Comment as CommentResource;

class PostCommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['store']);
    }

    public function index(BlogPost $post)
    {
        return CommentResource::collection($post->comments()->with('user')->get());
        //return $post->comments()->with('user')->get();
    }

    public function store(BlogPost $post, StoreComment $request)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        event(new AppCommentPosted($comment));

        return redirect()
        ->back()
        ->withStatus('Comment was created!');
    }
}
