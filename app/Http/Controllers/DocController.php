<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function index(){
        return view('documentation', [
            "title" => "Dokumentasi Musik",
            "orders" => Order::paginate(5)
        ]);
    }

    public function show(Order $order){
        // 
    }
}
