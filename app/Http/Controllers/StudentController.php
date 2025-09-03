<?php
// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::guard('student')->user();
        $subscriptions = $student->subscriptions()->with('class')->get();
        $classes = ClassModel::whereDoesntHave('subscriptions', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->get();

        return view('student.dashboard', compact('subscriptions', 'classes'));
    }

    public function subscribe(Request $request, $classId)
    {
        $student = Auth::guard('student')->user();

        // Check if already subscribed
        $existingSubscription = Subscription::where('student_id', $student->id)
            ->where('class_id', $classId)
            ->first();

        if ($existingSubscription) {
            return redirect()->back()->with('error', 'You are already subscribed to this class.');
        }

        Subscription::create([
            'student_id' => $student->id,
            'class_id' => $classId,
        ]);

        return redirect()->back()->with('success', 'Successfully subscribed to the class.');
    }

    public function unsubscribe($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        
        // Check if the subscription belongs to the authenticated student
        if ($subscription->student_id !== Auth::guard('student')->user()->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $subscription->delete();

        return redirect()->back()->with('success', 'Successfully unsubscribed from the class.');
    }
}