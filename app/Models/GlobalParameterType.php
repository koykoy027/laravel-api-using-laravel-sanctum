<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GlobalParameterType extends Model
{
    use HasFactory;
    protected $table = 'global_parameters_type';
    protected $guarded = [];

    public function globalParameters(): HasMany
    {
        return $this->hasMany(GlobalParameter::class, 'id');
    }

    public function created_by_user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'created_by', 'id');
    }

    public function updated_by_user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'updated_by', 'id');
    }
}
