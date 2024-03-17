<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlobalParameter extends Model
{
    use HasFactory;
    protected $table = 'global_parameters';
    protected $guarded = [];

    public function globalParameterType(): BelongsTo
    {
        return $this->belongsTo(GlobalParameterType::class, 'type', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
