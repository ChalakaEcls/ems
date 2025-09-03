<?php
// app/Models/Subscription.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function class():BelongsTo
    {
        return $this->belongsTo(ClassModel::class,'class_id');
    }
}
