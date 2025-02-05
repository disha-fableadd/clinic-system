<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    // use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'id',
        'role_id',
        'username',
        'fullname',
        'email',
        'phone',
        'profile',
        'password'
    ];
    protected $hidden = ['password', 'remember_token'];

    public function details()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');    }

    public function permissions()
    {
        return $this->hasMany(UserPermission::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
