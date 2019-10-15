@extends('layout')

@section('content')

<h1>{{ __('messages.welcome') }}</h1>
<p>@lang('messages.example_with_value', ['name' => 'John'])</p>
<p>{{ trans_choice('messages.plural', 0) }}</p>
<p>{{ trans_choice('messages.plural', 1) }}</p>
<p>{{ trans_choice('messages.plural', 2) }}</p>
<p>Hello this is welcome</p>
@endsection
