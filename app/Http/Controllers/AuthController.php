<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService =$userService;
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        $token = $user->createToken('SosialMediaToken')->accessToken;

        return response()->json([
            'message' => 'User registered successfully',
            'data'=>$user,
            'token'=>$token,
        ], 200);
    }

    public function login(LoginUserRequest $request)
    {
    $user = $this->userService->loginUser($request->all());

    if (!$user){
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
        return response()->json(['user'=> $user, 'token'=>$user->createToken('accesToken')->accessToken]);
//        return response()->json(['user'=> $user]);

    }
}
