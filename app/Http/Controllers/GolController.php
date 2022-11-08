<?php

namespace App\Http\Controllers;

use App\Models\gol;
use App\Models\Golongan;
use Illuminate\Http\Request;

class golController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // memanggil data Wali bersama dengan data siswa
        // yang dibuat dari method 'siswa' di model 'Wali'
        $gol = Golongan::all();
        $gols = Golongan::where('gol', 'gol')->count();

        return view('goals.index', ['gol' => $gol], compact('gols'));

    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:50',
            'jbtn' => 'required|min:11',
            'gol' => 'string',
            'jepe' => 'required',

        ]);

        $gol = new Golongan();
        $gol->jbtn = $request->jbtn;
        $gol->name = $request->name;
        $gol->gol = $request->gol;
        $gol->jepe = $request->jepe;

        $gol->save();

        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function show($id)
    {
        $gol = Golongan::findOrFail($id);
        return view('goals.show', compact('gol'));
    }

    public function edit($id)
    {
        $gol = Golongan::findOrFail($id);
        return view('goals.edit', compact('gol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'jbtn' => 'required|min:11',
            'gol' => 'string',
            'jepe' => 'required',

        ]);

        $gol = Golongan::findOrFail($id);
        $gol->name = $request->name;
        $gol->jbtn = $request->jbtn;
        $gol->gol = $request->gol;
        $gol->jepe = $request->jepe;

        $gol->save();

        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        //
        $gol = Golongan::findOrFail($id);
        $gol->delete();
        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
