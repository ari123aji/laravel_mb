<?php

namespace App\Http\Controllers;

use App\Models\pesnan;
use Illuminate\Http\Request;

class DashboardPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard.pesan.index', [
            'pesnans' => pesnan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pesan.create');
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
            'judul_lagu' => 'required',
            'trumpet' => 'max:30',
            'mello' => 'max:30',
            'baritone' => 'max:30',
            'tuba' => 'max:30',
            'marimba' => 'max:30',
            'vibraphone' => 'max:30',
            'xylophone' => 'max:30',
            'glockenspiel' => 'max:30',
            'snare' => 'max:30',
            'multitenor' => 'max:30',
            'bassdrum' => 'max:30',
            'deadline' => 'max:30',
            'pesan_a' => 'max:30',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        pesnan::create($validatedData);
        return redirect('/dashboard/pesan')->with('success', 'Pesanan berhasil ditambahkan, silahkan cek email secara berkala untuk update pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pesnan  $pesnan
     * @return \Illuminate\Http\Response
     */
    public function show(pesnan $pesnan)
    {
        return $pesnan;
        return view('dashboard.pesan.show', [
            'pesnan' => $pesnan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesnan  $pesnan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesnan $pesnan)
    {
        return view('dashboard.pesan.edit', [
            'pesnan' => $pesnan 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesnan  $pesnan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesnan $pesnan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesnan  $pesnan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesnan $pesnan)
    {
        //
    }
}
