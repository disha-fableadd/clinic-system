<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = 'treatment';

    protected $fillable = [
        'name',
        'doctor_id',
        'description',
    ];

    public function doctor()
    {
        return $this->belongsTo(Userr::class, 'doctor_id');
    }
}
