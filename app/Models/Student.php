<?php
// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'nic_number',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'subscriptions');
    }
}