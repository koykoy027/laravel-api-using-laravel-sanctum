<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

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
}
