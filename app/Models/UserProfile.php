<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "users_profile";
    protected $guarded = [];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function globalParameterGender() :BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'gender');
    }
    public function globalParameterCivilStatus() :BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'civil_status');
    }
    public function globalParameterReligion() :BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'religion');
    }
}
