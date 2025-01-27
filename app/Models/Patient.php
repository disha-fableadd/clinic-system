<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'first_name', 'last_name', 'email', 'gender', 'dob', 'age',
        'address', 'city', 'state', 'phone', 'avatar'
    ];

    protected $table = 'patients';

    public function appointment()
    {
        return $this->belongsTo(Appointment::class,'patient_id');
    }

}
