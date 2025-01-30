<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory;

    protected $table = 'userr';

    protected $fillable = [
        'role_id', 
        'fname', 
        'lname', 
        'email', 
        'password', 
        'gender', 
        'address', 
        'city', 
        'state', 
        'phone', 
        'image', 
        'joining_date',  
        'education',
        'experience',
    ];

    protected $casts = [
        'education' => 'array',
        'experience' => 'array',
    ];
    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
