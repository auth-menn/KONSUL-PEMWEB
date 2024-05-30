<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;

class SearchController extends Controller
{
    public function index(){
        $dokter = dokter::latest()->get();
        return view('search', compact('dokter'));
    }

    public function cari(Request $request){
                
        $keyword = $request->input('search');
        $dokter = dokter::where('nama', 'like', "%$keyword%")->paginate();
        return view('search', compact('dokter'));
     }
}
