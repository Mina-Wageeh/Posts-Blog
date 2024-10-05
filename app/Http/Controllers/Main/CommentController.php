<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public static function getComments($id)
    {
        return Comment::where('post_id' , $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function store(Request $request)
    {
        $commentObj = Comment::create
        ([
           'post_id' => $request -> post_id,
           'user_id' => $request -> user_id,
           'comment' => $request -> comment,
        ]);

        return response() -> json(['status' => 'ok' , 'comment_object' => $commentObj]);
    }

    public function like(Request $request)
    {
        $comment = Comment::find($request -> comment_id);

        if($comment)
        {
            $increase_likes = $comment -> update
            ([
                'likes_count' => $comment -> likes_count++
            ]);

            if($increase_likes)
            {
                return response() -> json(['status' => 'ok' , 'comment_object' => $comment]);
            }
        }
    }

    public function dislike(Request $request)
    {
        $comment = Comment::find($request -> comment_id);

        if($comment)
        {
            $increase_dislikes = $comment -> update
            ([
                'dislikes_count' => $comment -> dislikes_count++
            ]);

            if($increase_dislikes)
            {
                return response() -> json(['status' => 'ok' , 'comment_object' => $comment]);
            }
        }
    }



    public static function delete(Request $request)
    {
        $comment = Comment::find($request -> comment_id);

        if($comment)
        {
            $delete = $comment -> delete();

            if($delete)
            {
                return response() -> json(['status' => 'ok']);
            }
        }
    }
}
