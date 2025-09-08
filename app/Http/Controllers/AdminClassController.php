<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminClassController extends Controller
{
    public function index(): View
    {
        $classes = ClassModel::get();
        return view('admin.class.index', compact('classes'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'teacher' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string',
            'start_date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);


        ClassModel::create($data);

        return redirect()->route('admin.classes.index')->with('success', 'Class created!');
    }

    public function create(): View
    {
        return view('admin.class.create');
    }

    public function show(ClassModel $class): View
    {
        return view('admin.class.create', [
            'class' => $class,
        ]);
    }

    public function update(Request $request, ClassModel $class): RedirectResponse
    {

        $data = $request->validate([
            'teacher' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string',
            'start_date' => 'required|date',
            'time' => 'nullable',
        ]);


        $class->update($data);

        // subjects


        return redirect()->route('admin.classes.index')->with('success', 'Class updated!');
    }


    public function destroy(ClassModel $class): RedirectResponse
    {
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}
