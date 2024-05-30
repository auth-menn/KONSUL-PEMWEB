<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;
use App\Models\Appointment;



use Illuminate\Support\Facades\Auth;



class appointmentController extends Controller

{

    public function index(){
       // $dokter = dokter::all();
        $dokter = dokter::with('User')->get();

        return view('appoinments', compact('dokter'));
    }

    public function appointment(Request $request)
{
    $userId = Auth::id();
    // Validasi input jika diperlukan
    $validatedData = $request->validate([
        'dokter' => 'required',
        'user' => 'required',
        'date' => 'required',
        'time' => 'required',
    ]);

    // Simpan data ke dalam database
    $appointment = new Appointment();
    $appointment->dokter = $request->input('dokter');
    $appointment->user = $request->input('user');
    $appointment->user_id = $userId;
    $appointment->jam = $request->input('time');
    $appointment->hari = $request->input('date');
    $appointment->save();

    return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan!']);
}

public function cancel($id)
{
    // Logic to cancel the appointment with the given ID
    // Update the database or perform any other necessary actions

    // Redirect the user back to the appointment history page or any other appropriate page
    return redirect()->back()->with('message', 'Appointment canceled successfully.');
}


}
