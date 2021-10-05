@extends('dashboard.template.main')

@section('container')        
    <center>
        <div style="font-family: 'Sofia', sans-serif;">
            <h1>Selamat Datang {{ auth()->user()->name }}</h1>
            <h2>Untuk membuat pesanan musik, silahkan klik link dibawah ini : </h2>
        </div>
        <a href="/dashboard/orders" class="btn btn-success mb-3"><span data-feather="shopping-cart"></span> Lihat History Pemesanan</a>
        <a href="/dashboard/orders/create" class="btn btn-primary mb-3"><span data-feather="clipboard"></span> Buat pesanan baru</a>
    </center>
@endsection
