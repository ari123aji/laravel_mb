<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PelangganController extends Controller
{
    public function index(){
        return view('admin.pelanggan.index', [
            'users' => User::all()
        ]);
    }
}
