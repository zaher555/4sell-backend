<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return $users;
    }
    public function show($id)
    {
        $user=User::find($id);
        return $user;
    }
    public function register(UserRegisterRequest $validatedDate)
    {
        $user=User::where('email',$validatedDate['email'])->first();
        if(!$user)
        {
            $newUser=User::create([
                'name'=>$validatedDate['firstName'].' '. $validatedDate['lastName'],
                'email'=>$validatedDate['email'],
                'username'=>$validatedDate['username'],
                'phone'=>$validatedDate['phone'],
                'password'=>bcrypt($validatedDate['password']),
                'img'=>$validatedDate['img']
            ]);
            return response('user created successfully',200);
        }
        return response('user already exist',401);
    }
    public function updateUser(UserRegisterRequest $validatedDate,$id)
    {
        $user=User::find($id);
        if($user)
        {
            $newUser=$user->update([
                'name'=>$validatedDate['firstName'].' '. $validatedDate['lastName'],
                'email'=>$validatedDate['email'],
                'username'=>$validatedDate['username'],
                'phone'=>$validatedDate['phone'],
                'password'=>$validatedDate['password'],
                'img'=>$validatedDate['img']
            ]);
            return response('user update successfully',200);
        }
        return response('user not exist',401);
    }
    public function deleteUser($id)
    {
        $user=User::find($id);
        if($user)
        {
            $user->delete();
            return response('user deleted successfully',200);
        }
        return response('user not exist',401);
    }
}
