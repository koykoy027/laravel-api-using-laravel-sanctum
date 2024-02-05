<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "user_profiles";
    protected $fillable = [
        'id',
        'firstname',
        'middlename',
        'lastname',
        'gender',
    ];

    public function userProfile()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
