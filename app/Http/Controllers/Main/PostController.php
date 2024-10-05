<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use GeneralTrait ;

//    public function test()
//    {
//        $posts = Post::with('images')->get();
//        return view('test.test' , compact('posts'));
//    }


    public function index() //Show All Posts And Posts Count
    {
        $posts = Post::orderBy('id', 'DESC')->with(['images' , 'comments'])->paginate(5);
        $posts_count = $this -> postsCount();
        return view('posts.index' , compact(['posts' , 'posts_count']));
    }

    public function create() //Show The Form Which Creates New Post
    {
        return view('posts.create');
    }

    public function store(Request $request) //Store Info To Database
    {
//        $postImagesCount = count($request -> file('images'));

        $postObj = Post::create
        ([
            'user_id' => Auth()->user()->id,
            'description' => $request -> description,
//            'post_images_count' => $postImagesCount
        ]);

        if($postObj)
        {
            if($images = $request -> file('images'))
            {
                $index = 0;
                foreach ($images as $image)
                {
                    $file_extension = $image -> getClientOriginalExtension();
                    $file_new_name = 'F-' . time() . $index++ . '.' . $file_extension;
                    $file_path = 'imgs/posts/';
                    $image -> move($file_path , $file_new_name);
                    $storeImage = Image::create
                    ([
                        'post_id' => $postObj -> id,
                        'image' => $file_new_name,
                    ]);
                }
            }
            $posts_count = $this -> postsCount();
            return response() -> json(['status' => 'ok' , 'posts_count' => $posts_count , 'post_object' => $postObj]);
//            else
//            {
//                $file_new_name ='Empty';
//            }
        }
    }
//
    public function edit($id)
    {
        $post = Post::find($id);

        if($post)
        {
            return view('posts.edit' , compact('post'));
        }
    }

    public function update(Request $request , $id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post -> update
            ([
                'description' => $request -> description,
            ]);
            return redirect() -> route('posts.index');
        }
    }
//
    public function delete(Request $request)
    {
        $post = Post::find($request -> post_id);

        if($post)
        {
            $delete = $post -> delete();
            if($delete)
            {
                $posts_count = Post::count();
                return response() -> json(['status' => 'ok' , 'posts_count' => $posts_count]);
            }
        }
    }

    public function deleteNotAjax($id)
    {
        $post = Post::find($id);

        if($post)
        {
            $delete = $post -> delete();
            if($delete)
            {
               return redirect() -> route('posts.index');
            }
        }
    }

    public function deleteAll()
    {
        Post::select('*') -> delete();
        $posts_count = Post::count();
        return response() -> json(['status' => 'ok' , 'posts_count' => $posts_count]);
    }

    public function showFullPost($id)
    {
        $post = Post::with('images')->findOrFail($id);
        $comments = CommentController::getComments($id);
        return view('posts.full-post' , compact(['post' , 'comments']));
    }
}
