<div class="mb-2 mt-2">
    @auth
        <form action="{{ $route }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" type="text" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add comment!</button>
        </form>
    @else
        <a href="{{ route('login') }}">Sign-in</a> to post comments!
    @endauth
</div>
@errors @enderrors
<hr/>
