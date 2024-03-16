<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GlobalParameterType extends Model
{
    use HasFactory;
    protected $table = 'global_parameters_type';
    protected $guarded = [];

    public function globalParameter() :HasMany
    {
        return $this->hasMany(GlobalParameter::class, 'id');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'created_by', 'id');
    }
}
