<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Userr extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'password',
        'joining_date',
        'address',
        'city',
        'state',
        'role',
        'phone',
        'avatar',
        'permissions',
        'status',
        'department_id'
    ];

    protected $table = 'userr';

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'patient_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'doctor_id');
    }

}
