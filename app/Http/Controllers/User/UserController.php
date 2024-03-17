<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = UserResource::collection(
            User::allActive()
                ->get()
        );

        return response()->json([
            'data' => $data,
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user, UserProfile $userProfile)
    {
        $user->update([
            'email' => $request->email,
        ]);
        
        $userProfile->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'religion' => $request->religion,
        ]);

        return new UserResource($user);
    }
}
