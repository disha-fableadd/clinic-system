<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = 'treatments';

    protected $fillable = [
        'doctor_id',
        'name',
        'description',
    ];

    // Relationship with Doctor (assuming Doctor is a user with a specific role)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
