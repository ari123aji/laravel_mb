@extends('admin.template.main')

@section('container')        
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pesanan</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
  <div class="table-responsive table-bordered col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col" class="text-center">Nama Pemesan</th>
          <th scope="col" class="text-center">Judul Lagu</th>
          <th scope="col" class="text-center">Dipesan Sejak</th>
          <th scope="col" class="text-center">Status</th>
          <th scope="col" class="text-center">Harga</th>
          <th scope="col" class="text-center">Deadline(hari)</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $order->author->name }}</td>
          <td class="text-center">{{ $order->judul_lagu }}</td>
          <td class="text-center">{{ $order->created_at->diffForHumans() }}</td>
          <td class="text-center">{{ $order->status->name }}</td>
          <td class="text-center">{{ $order->harga }}</td>
          <td class="text-center">{{ $order->deadline }}</td>
          <td class="text-center">
              <a href="/dashboard/orders/{{ $order->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/orders/{{ $order->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
