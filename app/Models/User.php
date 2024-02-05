<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'created_by',
        'updated_by',
    ];

    public static function registerUser(RegisterRequest $request)
    {
        $user = self::create([
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserProfile::create([
            'id' => $user->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
        ]);
        return $user;
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'id');
    }

    public function students()
    {
        $this->hasMany(Student::class, 'id');
    }

    // public function createdAndUpdatedModels()
    // {
    //     $this->hasManyThrough(
    //         Student::class,
    //         User::class,
    //         'created_by', 'id',
    //         'id', 'id',
    //     );
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
