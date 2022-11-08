<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $jab = Jabatan::all();
        $gol = Golongan::all();
        return view('authen.register', compact('jab', 'gol'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|max:20',
            'name' => 'required|max:50',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data['password'] = Hash::make('password');

        User::create($data);

        return redirect()->rouute('login');
    }

    public function login()
    {
        $jab = Jabatan::all();
        $gol = Golongan::all();
        return view('authen.login',compact('jab','gol'));
    }
}
