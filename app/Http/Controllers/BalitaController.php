<?php

namespace App\Http\Controllers;


use App\Balita;
use App\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BalitaController extends Controller
{
    public function create()
    {
        return view('balita.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
        ]);

        $balita = new Balita();
        $balita->nama_balita = $request->nama_balita;
        $balita->nama_ibu = $request->nama_ibu;
        $balita->tanggal_lahir = $request->tanggal_lahir;
        $balita->jenis_kelamin = $request->jenis_kelamin;
        $balita->save();
        return redirect()->route('home.index');
    }
    public function createPengukuran()
    {
        $balitas = Balita::all();
        return view('pengukuran.create', compact('balitas'));

    }
    public function getNamaIbu($nama_balita)
    {
        $nama_ibu = Balita::where('nama_balita', $nama_balita)->select('nama_ibu')->distinct()->get();
        $options = '';
        foreach($nama_ibu as $ibu) {
            $options .= '<option value="' . $ibu->nama_ibu . '">' . $ibu->nama_ibu . '</option>';
        }
        return response()->json(['options' => $options]);
    }

    public function storePengukuran(Request $request)
    {
        $this->validate($request, [
            'nama_balita' => 'required',
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
        ]);

        $pengukuran = new Pengukuran;
        $pengukuran->nama_balita = $request->nama_balita;
        $pengukuran->nama_ibu = $request->nama_ibu;
        $pengukuran->berat = $request->berat;
        $pengukuran->tinggi = $request->tinggi;
        $pengukuran->tanggal_pengukuran = $request->tanggal_pengukuran;
        $pengukuran->save();
        return redirect()->route('home.index');
    }
    public function showHistory(Request $request)
    {
        $nama_balita = $request->input('nama_balita');
        $balitas = Balita::with('pengukuran')->where('nama_balita', $nama_balita)->first();
        $balitas = Balita::with(['pengukuran' => function ($query) use ($nama_balita) {
            $query->where('nama_balita', $nama_balita);
        }])->get();
        return view('balita.riwayat', ['data' => $balitas, 'balitas' => $balitas]);
    }


}
