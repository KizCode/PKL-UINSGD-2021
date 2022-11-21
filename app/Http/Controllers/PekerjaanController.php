<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peker = Pekerjaan::all();
        return view('pekerjaan.index', ['peker' => $peker]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','min:3'],
            'des' => ['required','min:5'],
        ]);

        $peker = new Pekerjaan();

        $peker->name = $request->name;
        $peker->des = $request->des;

        $peker->save();

        return redirect()->route('pekerjaan.index')
            ->with('success', 'Data berhasil dihapus!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $peker = Pekerjaan::findOrFail($id);
        return view('pekerjaan.show', compact('peker'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $peker = Pekerjaan::findOrFail($id);
        return view('pekerjaan.edit', compact('peker'));

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
        //
        $request->validate([
            'name' => ['required'],
            'des' => ['required','min:5'],
        ]);

        $peker = Pekerjaan::findOrFail($id);
        $peker->name = $request->name;
        $peker->des = $request->des;


        $peker->save();

        return redirect()->route('pekerjaan.index')
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
        //
        $peker = Pekerjaan::findOrFail($id);
        $peker->delete();
        return redirect()->route('pekerjaan.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}
