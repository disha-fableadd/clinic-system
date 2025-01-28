<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment';

    protected $fillable = [
        'pid', 
        'tid', 
        'did', 
        'date', 
        'time', 
        'patient_email', 
        'patient_phone'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid');
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'tid');
    }

    public function doctor()
    {
        return $this->belongsTo(Userr::class, 'did');
    }
}
