<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    protected $fillable = [
        'patient_id', 'department_id', 'doctor_id', 'appointment_date',
        'appointment_time', 'patient_email', 'patient_phone', 'status'
    ];

    protected $table = 'appointments';

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Userr::class, 'doctor_id');
    }
}
