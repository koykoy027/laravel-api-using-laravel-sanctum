<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    use HttpResponses;
    use CreatedByAndUpdatedBy;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !$user->is_active) {
            Auth::logout();
            return $this->error('', 'User is not active', 401);
        }

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
        ]);
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ] + $this->createdByAndUpdatedBy());
            

            UserProfile::create([
                'id' => $user->id,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status,
                'religion' => $request->religion,
            ]);
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return $error;
        }

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have been successfully logged out'
        ]);
    }
}
