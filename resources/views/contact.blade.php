@extends('layout')

@section('content')

<h1>Contact</h1>
<p>Hello this is contact</p>

@can('home.secret')
    <p>AEW</p>
    <a href="{{ route('secret') }}">
    Go to Especial contact detaiçs
    </a>
@endcan
@endsection
