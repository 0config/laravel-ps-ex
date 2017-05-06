{{--@extends('layouts.app')--}}
@extends('PS_base.PS_base')
@section('styles')
    <link rel="stylesheet" id="css_id" type="text/css" href="/css/welcome.css"/>
@endsection
@section('content')
    <div class="title m-b-md text-center">
        <img src="/images/laravel_logo.png">
    </div>

    <div class="links text-center">
        <a href="https://laravel.com/docs">Documentation</a>
        <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://github.com/laravel/laravel">GitHub</a>
    </div>
@endsection
