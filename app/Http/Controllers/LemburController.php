<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur = Lembur::all();
        return view('lembur.index', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lembur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validated = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
        ]);

        $lembur = new Lembur();
        $lembur->name = $request->name;
        $lembur->ttl = $request->ttl;
        $lembur->jk = $request->jk;
        $lembur->nip = $request->nip;
        $lembur->jabatan = $request->jabatan;
        $lembur->save();
        return redirect()->route('lembur.index')->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('lembur.show', compact('lembur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('lembur.edit', compact('lembur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validated = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
        ]);

        $lembur = Lembur::findOrFail($id);
        $lembur->name = $request->name;
        $lembur->ttl = $request->ttl;
        $lembur->jk = $request->jk;
        $lembur->nip = $request->nip;
        $lembur->jabatan = $request->jabatan;
        $lembur->save();
        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lembur = Lembur::findOrFail($id);
        $lembur->delete();
        return redirect()->route('lembur.index')->with('success', 'Data berhasil dihapus!');
    }
}
