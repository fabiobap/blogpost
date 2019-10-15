<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title ?? null) }}">
</div>


<div class="form-group">
    <label for="content">Content</label>
    <input class="form-control" type="text" name="content" id="content" value="{{ old('content', $post->content ?? null) }}">
</div>

<div class="form-group">
    <label for="content">Thumbnail</label>
    <input class="form-control-file" type="file" name="thumbnail">

</div>
@errors @enderrors
