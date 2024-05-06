<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postRepositoryContract ;
    public function __construct(PostRepositoryContract $postRepositoryContract)
    {
        $this->postRepositoryContract = $postRepositoryContract;
    }

    public function newPost(array $data)
    {
        $userId =Auth::user()->id;

        $newData =[
            'user_id'=>$userId,
            'post_text'=>$data['post_text'],
        ];
        $Post =$this->postRepositoryContract->newPost($newData);
        return $Post;
    }

    public function getAllPosts()
    {
        $allPost = $this->postRepositoryContract->getAllPosts();
        return $allPost;

    }

    public function myPost()
    {
        $allMyPosts = $this->postRepositoryContract->myPost();
        return $allMyPosts;
    }

    public function getPostByuserId($userId)
    {
        $post = $this->postRepositoryContract->getPostByUserID($userId);
        return $post;
    }

    public function getPostByPostId($postId)
    {
        $post = $this->postRepositoryContract->getPostByPostId($postId);
        return  $post;
    }


}
