<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';

  
    protected $fillable = [
        'full_name',
        'email',
        'gender',
        'dob',
        'age',
        'phone',
        'address',
        'city',
        'state',
        'image',
        'treatment_id',
    ];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_id');
    }
}
