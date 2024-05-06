<?php

namespace App\Repositories;

use App\Models\PostModel;
use App\Models\User;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryContract
{
    public function newPost(array $newData)
    {
        try {
        $newPost = new PostModel();
        $newPost ->fill($newData);
        $newPost->save();

        return $newPost;
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function getAllPosts()
    {
        return PostModel::all();
    }

    public function myPost()
    {
        $user= Auth::user();
        return response()->json(['postData' => $user->newPost()->get()]);
//        $postData = $user->newPost()->get();
    }

    public function getPostByUserID($userId)
    {
        $posts = PostModel::where('user_id', $userId)->get();
        return response()->json(['posts' => $posts]);
    }

    public function getPostByPostId($postId)
    {
        $posts = PostModel::where('id',$postId)->get();
        return $posts;
    }
}
