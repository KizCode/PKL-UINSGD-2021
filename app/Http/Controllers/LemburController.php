<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LemburController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // memanggil data Wali bersama dengan data siswa
        // yang dibuat dari method 'siswa' di model 'Wali'
        $lembur = Lembur::all();
        $lemburs = Lembur::where('kgtn', 'Lembur')->count();


        return view('lembur.index', ['lembur' => $lembur], compact('lemburs'));

    }

    public function create()
    {
        return view('lembur.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:50',
            'nip' => 'required|min:11',
            'kgtn' => 'string',
            'urai' => 'required',

        ]);

        $lembur = new Lembur();
        $lembur->nip = $request->nip;
        $lembur->name = $request->name;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;

        $lembur->save();

        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil dihapus!');

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
        $request->validate([
            'name' => 'required|max:50',
            'nip' => 'required|min:11',
            'kgtn' => 'string',
            'urai' => 'required',

        ]);

        $lembur = Lembur::findOrFail($id);
        $lembur->name = $request->name;
        $lembur->nip = $request->nip;
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
        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
