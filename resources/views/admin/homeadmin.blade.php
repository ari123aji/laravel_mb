@extends('admin.template.main')

@section('container')        
    <center>
        <div style="font-family: 'Sofia', sans-serif;">
            <h1>Selamat Datang {{ auth()->user()->name }}</h1>
            <h2>Lihat semua pesanan :  </h2>
        </div>
        <a href="/dashboardadmin">
            <button type="submit" class="btn btn-info">
            Daftar Pesanan<span data-feather="arrow-right"></span></button>
        </a>
    </center>
@endsection
