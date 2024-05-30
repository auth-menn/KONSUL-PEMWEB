<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $appointment = Appointment::where('user_id', $userId)->get();
        
        return view('history', compact('appointment'));
    }

    public function submitTestimonial(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        // Check if the appointment status is "approved"
        if ($appointment->status === 'aproved') {
            // Store the testimonial in the appointment record
            $appointment->testimonial = $request->input('testimonial');
            $appointment->save();

            return redirect()->back()->with('success', 'Testimonial submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'You can only submit a testimonial for an approved appointment.');
        }
    }
}
