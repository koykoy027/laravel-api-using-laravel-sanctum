<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\UserOTP;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HttpResponses;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();
        
        if (!$user->user_profile->is_active) {
            Auth::logout();
            return $this->error('', 'User is not active', 401);
        }

        if ($user->user_profile->is_otp_enabled) {

            $otp_reason = 'Login user';
            $generate_otp = new UserOTP();
            $generate_otp->generateOTP($user->user_profile, $otp_reason);
            Auth::logout();

            return $this->success([
                'generate_otp' => 1,
            ]);
        }

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
        ]);
    }
}
