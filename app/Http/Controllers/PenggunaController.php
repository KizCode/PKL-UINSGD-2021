<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $a = Siswa::all();
        return view('siswa.index', ['siswa' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $siswa = new Siswa();
        $siswa->nip = $request->nip;
        $siswa->nama = $request->nama;
        $siswa->jabatan = $request->jabatan;
        $siswa->email = $request->email;
        $siswa->password = $request->password;
        

        $siswa->save();
        return redirect()->route('siswa.index')->with(
            'succes',
            'Data berhasil dibuat!'
        );
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
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
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
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
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
        $validated = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required|bcrypt',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nip = $request->nip;
        $siswa->nama = $request->nama;
        $siswa->jabatan = $request->jabatan;
        $siswa->email = $request->email;
        $siswa->password = $request->password;
        

        $siswa->save();
        return redirect()->route('siswa.index')->with(
            'succes',
            'Data berhasil diedit!'
        );
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
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with(
            'succes',
            'Data berhasil dihapus!'
        );
    }
}