<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepositoryContract ;
    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract =$userRepositoryContract;
    }

    public function registerUser(array $data)
    {
        $userData =[
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ];

        $newUser = $this->userRepositoryContract->registerUser($userData);
        return $newUser;
    }

    public function loginUser(array $data)
    {
        $user = $this->userRepositoryContract->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)){
            return null;
        }
        Auth::login($user);
        return $user;

    }

    public function getMyProfile()
    {
        //menampilkan profile dan data postingan
        $user = $this->userRepositoryContract->getMyProfile();

//         $postData =$user->newPost()->get();
        return $user;
    }

    public function getOtherUserProfile($userId)
    {
//        return User::find($userId);
        return $this->userRepositoryContract->findById($userId);
    }
    public function searchUserByName($name)
    {
        return $this->userRepositoryContract->searchByName($name);
    }
}
