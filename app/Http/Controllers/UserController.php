<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Lembur;
use App\Models\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = User::with('jabatan', 'golongan')->paginate(10);
        $lemburs = Lembur::all('id')->count();
        $juser = User::all('id')->count();
        return view('user.index', ['user' => $user], compact('juser', 'lemburs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $use = User::all();
        return view('user.create', compact('jab', 'use', 'gol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'nip' => ['required', 'unique:users', 'min:8'],
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'file', 'image', 'max:4080'],
            'jabatan' => ['required'],
            'golongan' => ['required'],
            'level' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required'],

        ]);

        $newName = '';

        if ($request->file('image')) {
            $extendsion = $request->file('image')->getClientOriginalName();
            $newName = $request->name . '@' . now()->timestamp . '.' . $extendsion;
            $request->file('image')->storeAs('image', $newName);
        }

        $validatedData['image'] = $newName;
        $validatedData['jabatan_id'] = $request->jabatan;
        $validatedData['golongan_id'] = $request->golongan;
        $validatedData['password'] = Hash::make('password');

        $user = new User();
        $user->nip = $validatedData['nip'];
        $user->name = $validatedData['name'];
        $user->image = $validatedData['image'];
        $user->jabatan_id = $validatedData['jabatan_id'];
        $user->golongan_id = $validatedData['golongan_id'];
        $user->level = $validatedData['level'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect()
            ->route('user.index')->with(['success' => 'Data berhasil dibuat!']);

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
        return view('user.edit', compact('user', 'jab'));

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

        $validated = $request->validate([
            'nip' => 'required|max:20',
            'name' => 'required|max:50',
            'level' => ['nullable'],
            'email' => 'required',
            'password' => ['required'],
        ]);

        $user = User::findOrFail($id);
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->password = $request->password;
        // if ($request->hasFile('foto')) {
        //     $user->deleteImage();
        //     $image = $request->file('foto');
        //     $name = rand('1000', '9999') . $image->getClientOriginalName();
        //     $image->move('images/user/', $name);
        //     $user->foto = $name;
        // }

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
