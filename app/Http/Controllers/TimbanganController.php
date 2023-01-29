<?php

namespace App\Http\Controllers;

use App\Timbangan;
use Illuminate\Http\Request;

class TimbanganController extends Controller
{
    public function create()
    {
        return view('timbangan.create');
    }
    public function store(Request $request)
    {
        $timbangan = new Timbangan();
        $timbangan->tinggi = $request->tinggi;
        $timbangan->save();
        return redirect()->route('home.index');
    }
    public function getTinggi(){
        $tinggi = Timbangan::latest()->first();
        return response()->json([
            'tinggi' => $tinggi
        ]);
    }
}
