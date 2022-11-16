<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $lembur = Lembur::with('user')->paginate(10);
        $lemburs = Lembur::all('id')->count();
        return view('lembur.index', ['lembur' => $lembur], compact('lemburs'));
    }

    public function create()
    {
        return view('lembur.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [

            'tgl' => ['required','date'],
            'dari' => 'required',
            'sampai' => 'required',
            'kgtn' => 'required',
            'urai' => 'required|max:225',

        ]);

        $lembur = new Lembur();
        $lembur->tgl = $request->tgl;
        $lembur->dari = $request->dari;
        $lembur->sampai = $request->sampai;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;
        $lembur->user_id = Auth::user()->id;

        if ($lembur->tgl > \Carbon\Carbon::now()) {
            return back();
        } else {
            $lembur->save();
            return redirect()->route('lembur.index')
                ->with('success', 'Task Created Successfully!');
        }



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

            'tgl' => 'required|date',
            'dari' => 'required',
            'sampai' => 'required',
            'kgtn' => 'required',
            'urai' => 'required|max:225',

        ]);

        $lembur = Lembur::findOrFail($id);
        $lembur->tgl = $request->tgl;
        $lembur->dari = $request->dari;
        $lembur->sampai = $request->sampai;
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
