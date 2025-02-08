<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'age',
        'state',
        'city',
        'profile',
        'blood_group',
       
        'medical_history',
        'status',
        'treatment_id',
    ];

    // Relationship with Treatment (assuming a Treatment model exists)
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
