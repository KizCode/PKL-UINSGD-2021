<?php

namespace App\Http\Controllers;

use App\Models\Gol;
use App\Models\Jabatan;
use App\Models\Lembur;
use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // memanggil data Wali bersama dengan data siswa
        // yang dibuat dari method 'siswa' di model 'Wali'
        $gol = Gol::with('user','lembur')->paginate(10);
        $gols = Gol::where('id')->count();
        return view('goals.index', ['gol' => $gol], compact('gols'));

    }

    public function create()
    {
        $peker = Pekerjaan::all();
        $gol = Gol::with('lembur');
        return view('goals.create',compact('peker','gol'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'jepe' => ['nullable'],
            'lembur' => ['nullable']

        ]);

        $gol = new Gol();
        $gol->user_id = Auth::user()->id;
        if ($request->jepe == true){
            $gol->jepe = $request->jepe;
        } else {
            $gol->lembur_id = $request->lembur;
        }

        $gol->save();
        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function show($id)
    {
        $gol = Gol::findOrFail($id);
        return view('goals.show', compact('gol'));
    }

    public function edit($id)
    {
        $gol = Gol::findOrFail($id);
        return view('goals.edit', compact('gol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jepe' => 'required',

        ]);

        $gol = Gol::findOrFail($id);
        $gol->jepe = $request->jepe;
        $gol->lembur_id = $request->lembur;

        $gol->save();
        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        //
        $gol = Gol::findOrFail($id);
        $gol->delete();
        return redirect()->route('goals.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
