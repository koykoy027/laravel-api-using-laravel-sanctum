<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'email',
        'phone_number',
        'created_by',
        'updated_by',
    ];

    public function user_created_by(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    
    public function user_updated_by(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
