<?php

namespace App\Http\Controllers;


use App\Bayi;
use App\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BayiController extends Controller
{
    public function create()
    {
        return view('bayi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
        ]);

        $bayi = new Bayi();
        $bayi->nama_bayi = $request->nama_bayi;
        $bayi->nama_ibu = $request->nama_ibu;
        $bayi->tanggal_lahir = $request->tanggal_lahir;
        $bayi->jenis_kelamin = $request->jenis_kelamin;
        $bayi->save();
        return redirect()->route('home.index');
    }
    public function createPengukuran()
    {
        $bayis = Bayi::all();
        return view('pengukuran.create', compact('bayis'));

    }
    public function getNamaIbu($nama_bayi)
    {
        $nama_ibu = Bayi::where('nama_bayi', $nama_bayi)->select('nama_ibu')->distinct()->get();
        $options = '';
        foreach($nama_ibu as $ibu) {
            $options .= '<option value="' . $ibu->nama_ibu . '">' . $ibu->nama_ibu . '</option>';
        }
        return response()->json(['options' => $options]);
    }

    public function storePengukuran(Request $request)
    {
        $this->validate($request, [
            'nama_bayi' => 'required',
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
        ]);

        $pengukuran = new Pengukuran;
        $pengukuran->nama_bayi = $request->nama_bayi;
        $pengukuran->nama_ibu = $request->nama_ibu;
        $pengukuran->berat = $request->berat;
        $pengukuran->tinggi = $request->tinggi;
        $pengukuran->tanggal_pengukuran = $request->tanggal_pengukuran;
        $pengukuran->save();
        return redirect()->route('home.index');
    }
    public function showHistory(Request $request)
    {
        $nama_bayi = $request->input('nama_bayi');
        $bayis = Bayi::with('pengukuran')->where('nama_bayi', $nama_bayi)->first();
        $bayis = Bayi::with(['pengukuran' => function ($query) use ($nama_bayi) {
            $query->where('nama_bayi', $nama_bayi);
        }])->get();
        return view('bayi.riwayat', ['data' => $bayis, 'bayis' => $bayis]);
    }


}
