@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
            {{$post -> id}}
            <br>
            {{$post -> description}}
            <br>
            {{$post -> post_images_count}}
            <br>
            @foreach($post->images as $image)
                {{$image -> image}}
                <br>
            @endforeach
            <br><br><br>
        @endforeach
    </div>
</div>
@endsection

@section('style')
<style>
    .footer-container
    {
        display: none;
    }
</style>
@endsection


