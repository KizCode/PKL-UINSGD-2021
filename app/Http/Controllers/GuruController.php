<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // memanggil data Wali bersama dengan data siswa
        // yang dibuat dari method 'siswa' di model 'Wali'
        $guru = Guru::all();
        // dd($guru);
        // return $guru;
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'htgl' => 'required',
            'waktu' => 'required',
            'kgtn' => 'required',
            'urai' => 'required',

        ]);

        $guru = new Guru();
        
        $guru->htgl = $request->htgl;
        $guru->waktu = $request->waktu;
        $guru->kgtn = $request->kgtn;
        $guru->urai = $request->urai;

        
        $guru->save();
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            
            'htgl' => 'required',
            'waktu' => 'required',
            'kgtn' => 'required',
            'urai' => 'required',

        ]);

        $guru =  Guru::findOrFail($id);
        
        $guru->htgl = $request->htgl;
        $guru->waktu = $request->waktu;
        $guru->kgtn = $request->kgtn;
        $guru->urai = $request->urai;

        
      
        $guru->save();
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        //
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index')->with(
            'succes',
            'Data berhasil dihapus!'
        );
    }
}