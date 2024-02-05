<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return [
            User::activeUsers()
            ->with('students')
            ->get(),
        ];
    }

    public function show($id)
    {

        return [
            User::activeUsers()
                ->orWhere('id', $id)
                ->first(),
        ];
    }
}
