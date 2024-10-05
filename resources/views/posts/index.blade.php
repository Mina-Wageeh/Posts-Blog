@extends('layouts.site')

@section('content')
    @include('posts.create')
    @include('posts.show')
@endsection

@section('scripts')
    <script>
        $(document).ready(function()
        {
            if({{$posts_count}} > 0)
            {
                $('.delete-all-btn-container').css({'display' : 'block'});
            }

            $(document).on('click' , '#form-button' , function(e)
            {
                e.preventDefault()

                var formData = new FormData($('#post-form')[0])
                $.ajax({
                    type: 'post',
                    enctype : 'multipart/form-data',
                    url: '{{route('post.store')}}',
                    data: formData,
                    processData : false,
                    contentType : false,
                    cache : false,
                    success : function(data)
                    {
                        $(".add-textarea").val('');
                        $(".file-upload").val('');
                        $(".create-form-alert").slideDown(500).delay(1000).slideUp(500);
                        $('.posts_num').text(data.posts_count);
                        if(data.posts_count > 0)
                        {
                            $('.delete-all-btn-container').fadeIn(500);
                        }

                        var clonedPost= $('.empty-post-body').clone();
                        clonedPost.prependTo('.cloned-empty-posts-container');
                        clonedPost.fadeIn(500);
                        clonedPost.removeClass('empty-post-body');

                        clonedPost.find('.post_id_text').text(data.post_object.id);
                        clonedPost.find('.post-description').text(data.post_object.description);
                        clonedPost.find('.delete-btn').attr('post_id' , data.post_object.id);
                        clonedPost.find('.edit-btn').attr('href' , '/posts/edit/' + data.post_object.id);
                        clonedPost.find('.show-full').attr('href' , '/posts/' + data.post_object.id);

                    }
                })
            }),

            $(document).on('click' , '.delete-btn' , function(e)
            {
                e.preventDefault()
                var post_id = $(this).attr('post_id')
                var parent = $(this).parent().parent().parent()
                $.ajax({
                    type: 'post',
                    url: '{{route('post.delete')}}',
                    data:
                    {
                        '_token' : '{{csrf_token()}}',
                        'post_id' : post_id
                    },
                    success : function(data)
                    {
                        $('.posts_num').text(data.posts_count);
                        $(parent).fadeOut(500);
                        if(data.posts_count == 0)
                        {
                            $('.delete-all-btn-container').fadeOut(500);
                        }
                    }
                })
            }),

            $(document).on('click' , '.delete-all-btn' , function(e)
            {
                e.preventDefault()
                $.ajax({
                    type: 'post',
                    url: '{{route('post.delete.all')}}',
                    data:
                    {
                        '_token' : '{{csrf_token()}}',
                    },
                    success : function(data)
                    {
                        $('.posts_num').text(data.posts_count);
                        $('.post-container').fadeOut(500);
                        if(data.posts_count == 0)
                        {
                            $('.delete-all-btn-container').fadeOut(500);
                        }
                    }
                })
            })


        });
    </script>
@endsection



