@extends('layout')
@section('content')

<form action="{{ route('login') }}" method="post">
@csrf
    <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" name="remember" class="form-check-input" value="{{ old('remember') ? 'checked': '' }}">
        <label for="remember" class="form-check-label">
            Remember-me
        </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login!</button>
</form>
@endsection
