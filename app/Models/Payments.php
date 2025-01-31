<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'service_id',
        'amount',
        'payment_method',
        'transaction_id',
        'notes',
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Relationship with Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
