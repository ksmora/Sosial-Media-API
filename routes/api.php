<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::post('register','AuthController@register');

//Auth Group
Route::group([
    'middleware' =>'api',
    'prefix'=>'users'
], function (){
    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::group([
        'middleware'=>'auth:api'
    ], function (){
        //todo password reset
    });
});


// User group
Route::group([
    'middleware' =>'api',
    'prefix'=>'users'
], function (){
    Route::get('/search/{name}',[UserController::class,'searchUserByName']);
    Route::group([
        'middleware'=>'auth:api'
    ], function (){
        Route::get('/MyProfile',[UserController::class,'getMyProfile']);
        Route::get('/profile/{userid}',[UserController::class, 'getOtherUserProfile']);
        Route::post('/post/new',[PostController::class,'store']);
        Route::get('post/all',[PostController::class,'getAllPosts']);
        Route::get('post/mypost',[PostController::class,'myPosts']);
        Route::get('postbyuser/{userId}',[PostController::class,'getPostByUserId']);
        Route::get('/postbyid/{postId}',[PostController::class,'getPostByPostId']);
    });
});

