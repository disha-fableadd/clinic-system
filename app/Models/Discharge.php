<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discharge extends Model
{
    use HasFactory;

    protected $table = 'discharge';

    protected $fillable = [
        'pid',
        'tid',
        'did',
        'admit_date',
        'discharge_date',
        'discharge_reason',
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
