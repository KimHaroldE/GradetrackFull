<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'student'; // Table name
    protected $primaryKey = 'student_id'; // Primary key

    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'username',
        'profile_picture'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
