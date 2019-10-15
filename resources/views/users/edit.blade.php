@extends('layout')

@section('content')

<form action="{{ route('users.update', ['user' =>$user->id]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
@csrf

@method('PUT')

<div class="row">
    <div class="col-4">
        <img src="{{ $user->image ? $user->image->url() : '' }}" alt="" class="img-thumbnail avatar">
        <div class="card mt-4">
            <div class="card-body">
                <h6>Upload a different photo</h6>
                <input type="file" name="avatar" class="form-control-file">
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="name">{{ __('Language:') }}</label>
            <select name="locale" id="" class='form-control'>
                @foreach (App\User::LOCALES as $locale => $label)
                    <option value="{{ $locale }}" {{ $user->locale !== $locale ?: 'selected' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
        @errors @enderrors
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save Changes">
        </div>
    </div>
</div>
</form>

@endsection
