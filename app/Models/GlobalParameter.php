<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GlobalParameter extends Model
{
    use HasFactory;
    protected $table = 'global_parameters';
    protected $guarded = [];

    public function globalParameterType() :HasOne
    {
        return $this->hasOne(GlobalParameterType::class, 'type', 'id');
    }

    // public function createdBy()
    // {
    //     return $this->hasOne(User::class, 'created_by');
    // }
}
