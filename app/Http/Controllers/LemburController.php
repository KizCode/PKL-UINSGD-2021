<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    public function index()
    {
        // memanggil data Wali bersama dengan data siswa
        // yang dibuat dari method 'siswa' di model 'Wali'
        $lembur = Lembur::all();
        // dd($lembur);
        // return $lembur;
        return view('lembur.index', compact('lembur'));
    }

    public function create()
    {
        return view('lembur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'htgl' => 'required|date',
            'waktu' => 'required|time',
            'kgtn' => 'required',
            'urai' => 'required',

        ]);

        $lembur = new Lembur();

        $lembur->htgl = $request->htgl;
        $lembur->waktu = $request->waktu;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;

        $lembur->save();
        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function show($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('lembur.show', compact('lembur'));
    }

    public function edit($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('lembur.edit', compact('lembur'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'htgl' => 'required|date',
            'waktu' => 'required|time',
            'kgtn' => 'required',
            'urai' => 'required',

        ]);

        $lembur = Lembur::findOrFail($id);

        $lembur->htgl = $request->htgl;
        $lembur->waktu = $request->waktu;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;

        $lembur->save();
        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        //
        $lembur = Lembur::findOrFail($id);
        $lembur->delete();
        return redirect()->route('lembur.index')->with(
            'succes',
            'Data berhasil dihapus!'
        );
    }
}
