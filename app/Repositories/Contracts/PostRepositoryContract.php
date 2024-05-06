<?php

namespace App\Repositories\Contracts;

interface PostRepositoryContract
{
    public function newPost(array $newData);

    public function myPost();

    public function getAllPosts();

    public function getPostByUserID($userId);

    public function getPostByPostId($postId);
}
