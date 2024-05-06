<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPost =$this->postService->newPost($request->all());

        return response()->json([
            'data'=>[
                'succes'=>true,
                'message'=>'post update',
                'data'=>$newPost,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function getAllPosts()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json(['posts' => $posts]);
    }

    public function myPosts()
    {
        $posts = $this->postService->myPost();
        return response()->json(['posts' => $posts]);
    }

    public function getPostByUserId(Request $request,$userId)
    {
        $posts =$this->postService->getPostByuserId($userId);
        return response()->json(['posts'=>$posts]);
    }

    public function getPostByPostId(Request $request, $postId)
    {
        $posts = $this->postService->getPostByPostId($postId);
        return response()->json(['posts'=>$posts]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
