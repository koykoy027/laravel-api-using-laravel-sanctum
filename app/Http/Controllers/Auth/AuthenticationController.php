<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    use HttpResponses, CreatedByAndUpdatedBy;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !$user->user_profile->is_active) {
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

            $user_profile = UserProfile::create([
                'suffix' => $request->suffix,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status,
                'religion' => $request->religion,

                'job_description' => $request->job_description,
                'role' => $request->role,
                'is_admin' => $request->is_admin,
                'is_required_to_change_password' => $request->is_required_to_change_password,

            ] + $this->created_by_and_updated_by());

            User::create([
                'id' => $user_profile->id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user_profile = new UserResource($user_profile);

            DB::commit();

            return $this->success([
                'user_profile' => $user_profile,
            ]);


        } catch (\Exception $error) {
            DB::rollBack();
            return $this->error('', $error->getMessage(), 500);
        }

    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have been successfully logged out'
        ]);
    }
}
