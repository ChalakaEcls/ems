<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Only guests can access login/register
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['dashboard', 'logout']);
    }

    // Admin registration form
    public function showRegistrationForm()
    {
        return view('auth.admin-register'); // Make sure this view exists
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin account created successfully. Please login.');
    }

    // Admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Make sure this view exists
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // Dashboard (protected)
    public function dashboard()
    {
        $students = Student::withCount('subscriptions')->get();
        $classes = ClassModel::withCount('subscriptions')->get();
        $subscriptions = Subscription::count();

        return view('admin.dashboard', compact('students', 'classes', 'subscriptions'));
    }

    // =========================
    // Classes Management
    // =========================
    public function classes()
    {
        $classes = ClassModel::all();
        return view('admin.classes', compact('classes'));
    }

    public function createClassForm()
    {
        return view('admin.create-class');
    }

    public function createClass(Request $request)
    {
        $request->validate([
            'grade' => 'required|string',
            'subject' => 'required|string',
            'teacher' => 'required|string',
            'start_date' => 'required|date',
            'time' => 'required',
            'end_date' => 'required|date|after:start_date',
        ]);

        ClassModel::create($request->all());

        return redirect()->route('admin.classes')->with('success', 'Class created successfully.');
    }

    public function editClassForm($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('admin.edit-class', compact('class'));
    }

    public function updateClass(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|string',
            'subject' => 'required|string',
            'teacher' => 'required|string',
            'start_date' => 'required|date',
            'time' => 'required',
            'end_date' => 'required|date|after:start_date',
        ]);

        $class = ClassModel::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('admin.classes')->with('success', 'Class updated successfully.');
    }

    public function deleteClass($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.classes')->with('success', 'Class deleted successfully.');
    }

    // =========================
    // Students Management
    // =========================
    public function students()
    {
        $students = Student::with('subscriptions.class')->get();
        return view('admin.students', compact('students'));
    }
}
