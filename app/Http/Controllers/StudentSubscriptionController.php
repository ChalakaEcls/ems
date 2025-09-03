<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentSubscriptionController extends Controller
{
    public function index(): View
    {
          $subscriptions = Subscription::with(['student'])->get();
        return view('admin.subscription.index',compact('subscriptions'));
    }


//    public function update(Request $request, Subscription $subscription): RedirectResponse
//    {
//
//        $data = $request->validate([
//            'teacher' => 'required|string',
//            'grade' => 'required|string',
//            'subject' => 'required|string',
//            'start_date' => 'required|date',
//            'end_date' => 'required|date',
//            'time' => 'nullable',
//        ]);
//
//
//        $subscription->update($data);
//
//        // subjects
//
//
//        return redirect()->route('admin.subscriptions.index')->with('success', 'Class updated!');
//    }


    public function destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'Class deleted successfully.');
    }}
