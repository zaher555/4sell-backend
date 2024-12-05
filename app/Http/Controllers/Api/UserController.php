<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    public function allAdmins()
    {
        $admins=User::where('role','admin')->get();
        return response()->json(['data' => UserResource::collection($admins)]);
    }
    public function allUsers()
    {
        $users=User::where('role','user')->get();
        return response()->json(['data' => UserResource::collection($users)]);
    }
    public function show($id)
    {
        $user=User::find($id);
        return new UserResource($user);
    }
    public function register(UserRegisterRequest $validatedDate)
    {
        $user=User::where('email',$validatedDate['email'])->first();
        if(!$user)
        {
            $newUser=User::create([
                'name'=>$validatedDate['name'],
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
                'name'=>$validatedDate['name'],
                'email'=>$validatedDate['email'],
                'username'=>$validatedDate['username'],
                'phone'=>$validatedDate['phone'],
                'password'=>$validatedDate['password'],
                'img'=>$validatedDate['img']
            ]);
            return response()->json(['message' => 'User updated successfully'], 200);
        }
        return response()->json(['message' => 'User not found'], 404);
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
