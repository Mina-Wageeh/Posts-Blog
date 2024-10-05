<?php


namespace App\Traits;


use App\Models\Post;

trait GeneralTrait
{
    public function saveFile($request_file , $path)
    {
        $file_extension = $request_file -> getClientOriginalExtension();
        $file_new_name = 'F-' . time() . '.' . $file_extension;
        $file_path = $path;
        $request_file -> move($file_path , $file_new_name);
        return $file_new_name;
    }

    public function postsCount()
    {
        return Post::count();
    }

}
