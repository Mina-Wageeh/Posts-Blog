@extends('layouts.site')

@section('content')
<div class="form-container d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="form-container-title">
            <h3 class="text-center">Add New Post</h3>
        </div>
        <form id="post-form" action="{{route('post.update' , $post -> id)}}" method="post" enctype="multipart/form-data" class="create-form col-12 align-middle">
        @csrf
            <div class="mb-3">
                <textarea id="description" class="form-control add-textarea" name="description" type="text" placeholder="Write Your Post Here">{{$post -> description}}</textarea>
            </div>
            <button type="submit" id="form-button" class="btn btn-dark col-12">Update</button>
        </form>
    </div>
</div>
@endsection
