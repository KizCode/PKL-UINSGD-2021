<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use PhpOption\Option;

class UserController extends Controller
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
    {;
        $user = User::with('jabatan')->paginate(10);
        $juser = User::all('id')->count();
        $users = User::where('level','user')->count();
        $admins = User::where('level','admin')->count();
        return view('user.index', ['user' => $user], compact('users', 'juser', 'admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        $use = User::with('jabatan');
        return view('user.create', compact('jab', 'use'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|max:20',
            'name' => 'required|max:50',
            'level' => 'string',
            'email' => 'required',
            'password' => 'required',
        ]);



        $user = new User();
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect()
            ->route('user.index')->with('toast_success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $use = User::with('jabatan')->findOrFail($id);
        return view('user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jab = Jabatan::all();
        $user = User::findOrFail($id);
        return view('user.edit', compact('user','jab'));

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
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nip' => 'required|max:20',
            'name' => 'required|max:50',
            'level' => 'string',
            'email' => 'required',
            'password' => 'nullable',
        ]);


        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect()
            ->route('user.index')->with('toast_success', 'Data berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->route('user.index')->with('success', 'Data berhasil dihapus!');

    }
}
