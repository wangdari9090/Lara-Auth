@extends('layouts.main')

@section('title', 'Home Page')

@section('content')
<h1>Welcome to MyApp!</h1>
<p>This is the homepage content.</p>
<a href="{{ route('show.login') }}">Login</a>
@endsection
