<?php

namespace App\Http\Controllers\API\V1;

use App\BlogPost;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CommentPosted as AppCommentPosted;
use App\Http\Requests\StoreComment;
use App\Http\Resources\Comment as CommentResource;

class PostCommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'destroy', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogPost $post, Request $request)
    {
        $perPage = $request->input('per_page') ?? 15;
        return CommentResource::collection($post->comments()->with('user')->paginate($perPage)->appends([
            'per_page' => $perPage
        ]));
        /*   return CommentResource::collection($post->comments()->with('user')->paginate($perPage)->appends([
            'per_page' => $perPage
        ])); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPost $post, StoreComment $request)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        event(new AppCommentPosted($comment));

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post, Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPost $post, Comment $comment, StoreComment $request)
    {
        $this->authorize($comment);
        $comment->content = $request->input('content');
        $comment->save();
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post, Comment $comment)
    {
        $this->authorize($comment);
        $comment->delete();
        return response()->noContent();
    }
}
