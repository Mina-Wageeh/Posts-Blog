@extends('layouts.site')

@section('content')
    <div class="home-container flex-center">
        <div class="content m-0">
            <div class="home-main-text">{ POSTS BLOG }</div>
            <div class="links">
                <a class="all-posts-btn btn btn-dark" href="{{route('posts.index')}}">All Posts</a>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .home-container
        {
            height: calc(100% - 100px);
        }
    </style>
@endsection
