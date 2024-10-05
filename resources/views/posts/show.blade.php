<div class="container all-posts-container">
    <div class="all-posts-container-title text-center">
        <h3>All Posts<br>( <span class="posts_num">{{$posts_count}}</span> )</h3>
    </div>
    <div class="delete-all-btn-container text-center col-12" style="margin-bottom: 30px">
        <a class="btn btn-danger delete-all-btn col-12">Delete All</a>
    </div>
        <div class="pc-all">
            @include('posts.includes.empty-post-body')
            <div class="cloned-empty-posts-container">
            </div>
            @foreach($posts as $post)
                <div class="post-container" style="margin-bottom: 30px">
                    <div class="post-header d-flex justify-content-between align-items-center">
                        <div class="post-id col-4 d-flex justify-content-start">
                            <h6 class="fw-bold">ID : {{$post -> id}}</h6>
                        </div>

                        <div class="show-full-post">
                            <a href="{{route('full.post' , $post->id)}}">Show Full Post</a>
                        </div>
                        <div class="post-actions col-4 d-flex justify-content-end">
                            <a class="btn edit-btn" href="{{route('post.edit' , $post -> id)}}">Edit</a>
                            <a post_id="{{$post -> id}}" class="btn delete-btn">Delete</a>
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
                        <div class="comments-main-container mt-3">
                            <div class="cloned-comments">
                            </div>
                            @foreach($post -> comments as $comment)
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
            @endforeach
        </div>
{{--        @if($posts_count > 5)--}}
{{--            <div class="d-flex justify-content-center m-0">--}}
{{--                    {{$posts -> links()}}--}}
{{--            </div>--}}
{{--        @endif--}}
</div>
