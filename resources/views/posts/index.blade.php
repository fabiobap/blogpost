@extends('layout')

@section('content')
<div class="row">
    <div class="col-8">
    @forelse ($posts as $post)
        <p>
            <h3>
                @if ($post->trashed())
                    <del>
                @endif
                <a class="{{ $post->trashed() ? 'text-muted' : ''}}" href="{{ route('posts.show', ['post' => $post->id]) }}">
                    {{ $post->title }}
                </a>
                @if ($post->trashed())
                    </del>
                @endif
            </h3>
            @updated(['date' => $post->created_at, 'name' => $post->user->name, 'userId' => $post->user->id])
            @endupdated
            @tags(['tags'=>$post->tags])
            @endtags

            {{ trans_choice('messages.comments', $post->comments_count) }}

            @auth
                @can('update', $post)
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">
                            Edit
                    </a>
                @endcan
            @endauth
            @auth
                @if (!$post->trashed())

                    @can('delete', $post)

                    <form class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete!" class="btn btn-primary">
                        </form>
                        @endcan
                @endif
            @endauth
        </p>
    @empty
        <p>No blog posts yet!</p>
    @endforelse
    </div>
    <div class="col-4">
        @include('posts._activity')
    </div>
</div>
@endsection
