<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'doctor_id', 'days', 'start_time', 'end_time'
    ];

    protected $table = 'schedules';

    public function doctor()
    {
        return $this->belongsTo(Userr::class, 'doctor_id');
    }
}
