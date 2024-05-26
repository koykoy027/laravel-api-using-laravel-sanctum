<?php

namespace App\Models;

use App\Mail\OTPLogin;
use App\Traits\HttpResponses;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserOTP extends Model
{
    use HasFactory, HttpResponses;
    protected $table = 'users_otp';
    protected $guarded = [];


    public function generate_otp($users_profile, $otp_reason)
    {
        // $otp = Str::random(6); // 6 characters
        $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); // 6 digits
        $firstname = $users_profile->firstname;
        $email = $users_profile->user->email;
        $users_profile_id = $users_profile->id;
        $otp_portal = $users_profile->otp_portal;
        $expired_at = Carbon::now()->addMinutes(3);

        $generated_otp = $this->create([
            'users_profile' => $users_profile_id,
            'otp' => $otp,
            'otp_portal' => $otp_portal,
            'otp_reason' => $otp_reason,
            'expired_at' => $expired_at,
        ]);

        if ($otp_reason == 'Login user') {
            if ($otp_portal == 1) {
                Mail::to($email)->send(new OTPLogin($otp, $firstname));
            }
        }

        return $this->success([
            'generated_otp' => $generated_otp
        ]);
    }

    public static function latest_otp($user_profile)
    {

        $latest_otp = self::where('users_profile', $user_profile->id)
            ->where('otp_portal', $user_profile->otp_portal)
            ->latest()
            ->first();

        return $latest_otp;
    }
}
