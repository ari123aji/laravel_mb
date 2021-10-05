<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Registration'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'unit_mb' => 'required',
            'email' => 'unique:users|email:dns|max:255',
            'password' => 'required|min:8|max:36'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration success! Please Login!!')  ;

    }
}
