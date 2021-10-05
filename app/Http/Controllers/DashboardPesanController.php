<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.orders.index',[
            'orders' => order::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.orders.create');
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
            'slug' =>'required|unique:orders|max:500',
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
            'deadline' => 'max:30|required',
            'pesan_a' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        order::create($validatedData);
        return redirect('/dashboard/orders')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if(auth()->user()->email == "admin@gmail.com"){
            return view('admin.edit', [
                'order' => $order,
                'statuses' => Status::all()
            ]);            
        }
        return view('dashboard.orders.edit', [
            'order' => $order 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $rules = [
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
            'deadline' => 'max:30|required',
            'status_id' => 'required',
            'harga' => 'required',
            'video' => 'file',
            'pdf' => 'file|max:10240',
            'pesan_a' => 'required',
        ];

        if($request->slug != $order->slug) {
            $rules['slug'] = 'required|unique:posts|max:500';
        }

        $validatedData = $request->validate($rules);

        if(auth()->user()->email == "admin@gmail.com"){
            if($request->file('video')){
                $validatedData['video'] = $request->file('video')->store('post-videos');    
            }
            if($request->file('pdf')){
                $validatedData['pdf'] = $request->file('pdf')->store('post-pdfs');    
            }
            $validatedData['user_id'] = $order->author->id;
            Order::where('id', $order->id)
            ->update($validatedData);

            return redirect('/dashboardadmin')->with('success', 'Pesanan berhasil di update');     
        }
        $validatedData['user_id'] = auth()->user()->id;

        Order::where('id', $order->id)
            ->update($validatedData);

        return redirect('/dashboard/orders')->with('success', 'Pesanan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->video){
            Storage::delete($order->video);
        }
        if($order->pdf){
            Storage::delete($order->pdf);
        }
        Order::destroy($order->id);

        return redirect('/dashboard/orders')->with('success', 'Pesanan berhasil dihapus');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Order::class, 'slug', $request->judul_lagu);
        return response()->json(['slug' => $slug]);
    }
}
