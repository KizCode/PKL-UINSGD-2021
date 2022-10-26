<?php

namespace App\Http\Controllers;

use App\Models\gol;
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
        $gol = gol::all();
        $gols = gol::where('gol', 'gol')->count();

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

        $gol = new gol();
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
        $gol = gol::findOrFail($id);
        return view('goals.show', compact('gol'));
    }

    public function edit($id)
    {
        $gol = gol::findOrFail($id);
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

        $gol = gol::findOrFail($id);
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
        $gol = gol::findOrFail($id);
        $gol->delete();
        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
