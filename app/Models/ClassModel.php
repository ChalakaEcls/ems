<?php
// app/Models/ClassModel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'grade',
        'subject',
        'teacher',
        'start_date',
        'time',
    ];

    public function subscriptions()
    {
       return $this->hasMany(Subscription::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'student_id');
    }
}