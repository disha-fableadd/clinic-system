<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $fillable = ['name', 'description', 'status'];
    protected $table = 'departments';
    public function appointment()
    {
        return $this->belongsTo(Appointment::class,'patient_id');
    }

}
