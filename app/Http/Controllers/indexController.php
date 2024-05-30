<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\dokter;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
     

        $dokters = dokter::with('user')->get();

        return view ('index', compact('dokters'));
    }

    public function appointment(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'dokter' => 'required',
            'user' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
    
        // Simpan data ke dalam database
        $appointment = new Appointment;
        $appointment->dokter = $request->input('dokter');
        $appointment->user = $request->input('user');
        $appointment->jam = $request->input('time');
        $appointment->hari = $request->input('date');
        $appointment->save();
    
        return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
}
