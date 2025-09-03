<?php
// app/Http/Controllers/APIController.php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function studentsWithSubscriptions()
    {
        $students = Student::with('subscriptions.class')->get();
        
        return response()->json($students);
    }
}