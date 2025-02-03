<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDischargeDets extends Model
{
    use HasFactory;

    protected $table = 'patient_discharge_dets';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'treatment_id',
        'room_number',
        'bed_number',
        'admintting_diagnos',
        'discharge_diagnos',
        'total_bill',
        'insurance_coverage',
        'amount_paid',
        'payment_status',
        'discharge_note',
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Treatment
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
