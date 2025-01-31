<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    use HasFactory;

    protected $table = 'medical_reports';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'service_id',
        'description',
        'file_path',
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with Doctor (assuming Doctor is a user with a specific role)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // Relationship with Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
