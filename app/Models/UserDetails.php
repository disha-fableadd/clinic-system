<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'address',
        'state',
        'city',
        'gender',
        'birth_date',
        'shift',
        'salary',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
