@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="post-container" style="margin-bottom: 30px ; margin-top: 30px">
            <div class="post-header d-flex justify-content-between align-items-center">
                <div class="post-id col-4 d-flex justify-content-start">
                    <h6 class="fw-bold">ID : {{$post -> id}}</h6>
                </div>
                <div class="post-actions col-4 d-flex justify-content-end">
                    <a class="btn edit-btn" href="{{route('post.edit' , $post -> id)}}">Edit</a>
                    <a href="{{route('post.delete.not.ajax' , $post -> id)}}" class="btn delete-btn">Delete</a>
                </div>
            </div>
            <hr>
            <div class="bg-transparent border-dark text-center">{{$post -> description}}</div>
            <hr>
            <div class="d-flex justify-content-center">
                @foreach($post->images as $image)
                    <img class="mx-2" style="width: 50px ; height: 50px" src="{{asset('imgs/posts/' . $image -> image)}}">
                @endforeach
            </div>
            <hr>


            <div class="comment-container">
                <form id="comment-form" method="post" class="d-flex justify-content-between">
                    @csrf
                    <div class="comment-input-cont col-10">
                        <input id="comment-input" class="form-control comment-input" name="comment" type="text" placeholder="Add Your Comment">
                    </div>
                    <div class="comment-button-cont col-2 d-flex justify-content-end">
                        <a class="btn btn-success comment-button col-10">Comment</a>
                    </div>
                </form>
                <div class="comments-main-container">
                    <div class="cloned-comments">
                    </div>
                    @foreach($comments as $comment)
                        <div class="single-comment-container mb-3">
                            <div class="comment-body mb-1">
                                <div class="comment-content">
                                    {{$comment -> comment}}
                                </div>
                                <div class="comment-delete">
                                    <a comment_id="{{$comment -> id}}" class="comment-delete-btn">x</a>
                                </div>
                            </div>
                            <div class="reactions d-flex">
                                <div comment_id="{{$comment -> id}}" class="like">Like ( <span class="likes_count">{{$comment -> likes_count}}</span> )</div>
                                <div comment_id="{{$comment -> id}}" class="dislike">Dislike ( <span class="dislikes_count">{{$comment -> dislikes_count}}</span> )</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @include('posts.includes.empty-comment-body')
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .post-container
        {
            padding: 20px 20px 0 20px;
        }
    </style>
@endsection


@section('scripts')
    <script>
        $(document).on('click' , '.comment-button' , function(e)
        {
            e.preventDefault()
            var comment = $('.comment-input').val()
            $.ajax({
                type : 'post',
                url: '{{route('comment.store')}}',
                data:
                {
                    '_token' : '{{csrf_token()}}',
                    'comment' : comment,
                    'post_id' : {{$post -> id}},
                    'user_id' : {{Auth() -> user() -> id}},
                },
                success:function(data)
                {
                    $('.comment-input').val('');
                    var clonedComment = $('.empty-comment-body').clone()
                    clonedComment.prependTo('.cloned-comments');
                    clonedComment.fadeIn(500);
                    clonedComment.removeClass('empty-comment-body');

                    clonedComment.find('.comment-content').text(data.comment_object.comment);
                    clonedComment.find('.comment-delete-btn').attr('comment_id' , data.comment_object.id);
                    clonedComment.find('.like').attr('comment_id' , data.comment_object.id);
                    clonedComment.find('.dislike').attr('comment_id' , data.comment_object.id);
                    clonedComment.find('.likes_count').text(data.comment_object.likes_count);
                    clonedComment.find('.dislikes_count').text(data.comment_object.dislikes_count);
                }

            })
        }),


        $(document).on('click' , '.comment-delete-btn' , function(e)
        {
            e.preventDefault()

            var comment_id = $(this).attr('comment_id');
            var comment_parent = $(this).parent().parent().parent();
            $.ajax({
                type: 'post',
                url: '{{route('comment.delete')}}',
                data:
                    {
                        '_token' : '{{csrf_token()}}',
                        'comment_id' : comment_id
                    },
                success : function()
                {
                    $(comment_parent).fadeOut(500);
                }
            })
        }),


        $(document).on('click' , '.like' , function(e)
        {
            e.preventDefault()

            var comment_id = $(this).attr('comment_id');
            var this_comment = $(this);
            $.ajax({
                type: 'post',
                url: '{{route('comment.like')}}',
                data:
                    {
                        '_token' : '{{csrf_token()}}',
                        'comment_id' : comment_id
                    },
                success : function(data)
                {
                    this_comment.find('.likes_count').text(data.comment_object.likes_count)
                }
            })
        }),


        $(document).on('click' , '.dislike' , function(e)
        {
            e.preventDefault()

            var comment_id = $(this).attr('comment_id');
            var this_comment = $(this);
            $.ajax({
                type: 'post',
                url: '{{route('comment.dislike')}}',
                data:
                    {
                        '_token' : '{{csrf_token()}}',
                        'comment_id' : comment_id
                    },
                success : function(data)
                {
                    this_comment.find('.dislikes_count').text(data.comment_object.dislikes_count)
                }
            })
        })


    </script>
@endsection
