<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService =$userService;
    }
    public function getMyProfile(Request $request)
    {
        $user = $this->userService->getMyProfile();

        return response()->json(['user' => $user]);
    }
    public function getOtherUserProfile(Request $request, $userId)
    {
        $user = $this->userService->getOtherUserProfile($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function searchUserByName(Request $request, $name)
    {
        $users = $this->userService->searchUserByName($name);
        return response()->json(['users' => $users]);
    }
}
