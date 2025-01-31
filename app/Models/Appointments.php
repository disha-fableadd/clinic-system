<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'treatment_id',
        'appoint_type',
        'status',
        'time',
        'duration',
        'clinic_location',
        'followup_required',
        'followup_update',
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relationship with Treatment
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
