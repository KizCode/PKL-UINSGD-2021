<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
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
    {
        $user = User::all();
        $users = User::where('level','user')->count();
        $admins = User::where('level','admin')->count();
        return view('user.index', ['user' => $user], compact('users', 'admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));

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
            'password' => 'required',
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
