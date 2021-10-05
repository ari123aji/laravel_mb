@extends('admin.template.main')

@section('container')
@if($users->count())
<h2 class="mt-3 mb-3">Daftar Pelanggan</h2>
      <div class="table-responsive table-bordered col-lg-8 mt-3">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" class="text-center">Nama Pelanggan</th>
              <th scope="col" class="text-center">E-mail</th>
              <th scope="col" class="text-center">Nomor HP</th>
              <th scope="col" class="text-center">Unit Marching Band</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users->skip(1) as $user)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="text-center">{{ $user->name }}</td>
              <td class="text-center">{{ $user->email }}</td>
              <td class="text-center">{{ $user->no_hp }}</td>
              <td class="text-center">{{ $user->unit_mb }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@else
    <p class="text-left fs-4 mt-3" >Belum Ada User</p>
@endif
@endsection