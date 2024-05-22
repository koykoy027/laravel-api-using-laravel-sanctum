<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "users_profile";
    protected $guarded = [];

    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function allActive()
    {
        $users = self::where('is_active', self::ACTIVE);
        return $users;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function global_parameter_gender(): BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'gender');
    }
    public function global_parameter_civil_status(): BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'civil_status');
    }
    public function global_parameter_religion(): BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'religion');
    }
}
