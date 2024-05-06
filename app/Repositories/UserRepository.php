<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryContract
{
    public function registerUser(array $data)
    {
        try{
            $newUser = new User();
            $newUser-> fill($data);
            $newUser->save();
            return $newUser;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getMyProfile()
    {
        $user_id= Auth::user()->id;
        $user = User::with('newPost')->find($user_id);

        return $user;
    }
    public function findByEmail( $data): ?User
    {
        return User::where('email', $data)->first();
    }

    public function findById($userId)
    {
        return User::find($userId);
    }
    public function searchByName($name)
    {
        return User::where('name', 'LIKE', "%$name%")->get();
    }

}
