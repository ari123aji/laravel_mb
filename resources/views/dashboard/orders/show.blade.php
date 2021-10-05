@extends('dashboard.template.main')

@section('container')
<h2>Detil Pemesanan</h2>
<div class="p-0 p-md-5 mb-4 col-lg-10">
    <div class="col-md-10 px-0">
      <h1 class="display-4 fst-italic">Judul lagu : {{ $order->judul_lagu }}</h1>
      <p class="lead my-3">Pesan ke Arranger : {!! $order->pesan_a !!}</p>
      <a href="/dashboard/orders" class="btn btn-success mb-3"><span data-feather="arrow-left-circle"></span> Kembali ke Pesanan</a>
      <a href="/dashboard/orders/{{ $order->slug }}/edit" class="btn btn-warning mb-3"><span data-feather="edit"></span> Edit</a>
    </div>
    <div class="table-responsive table-bordered col-lg-6">
        <table class="table table-striped table-light">
            <thread>
                <tr>
                    <th scope="col" class="text-center">Alat Musik</th>
                    <th scope="col" class="text-center">Jumlah</th>
                </tr>
            </thread>
            <tbody>
                <tr>
                    <td class="text-center">Trumpet</td>
                    <td class="text-center">{{ $order->trumpet }}</td>
                </tr>
                <tr>
                    <td class="text-center">Mellophone</td>
                    <td class="text-center">{{ $order->mello }}</td>
                </tr>
                <tr>
                    <td class="text-center">Baritone</td>
                    <td class="text-center">{{ $order->baritone }}</td>
                </tr>
                <tr>
                    <td class="text-center">Tuba</td>
                    <td class="text-center">{{ $order->tuba }}</td>
                </tr>
                <tr>
                    <td class="text-center">Marimba</td>
                    <td class="text-center">{{ $order->marimba }}</td>
                </tr>
                <tr>
                    <td class="text-center">Vibraphone</td>
                    <td class="text-center">{{ $order->vibraphone }}</td>
                </tr>
                <tr>
                    <td class="text-center">Xylophone</td>
                    <td class="text-center">{{ $order->xylophone }}</td>
                </tr>
                <tr>
                    <td class="text-center">Glockenspiel</td>
                    <td class="text-center">{{ $order->glockenspiel }}</td>
                </tr>
                <tr>
                    <td class="text-center">Snare Drum</td>
                    <td class="text-center">{{ $order->snare }}</td>
                </tr>
                <tr>
                    <td class="text-center">Multitenor</td>
                    <td class="text-center">{{ $order->multitenor }}</td>
                </tr>
                <tr>
                    <td class="text-center">Bass Drum</td>
                    <td class="text-center">{{ $order->bassdrum }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @if($order->video)
        <h4>Video Scoring : </h4>
        <video width="640" height="480" controls>
            <source src="{{ asset('storage/'.$order->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p>Untuk mendownload video scoring, klik : </p><a href="{{ asset('storage/'.$order->video) }}">disini</a>
    @endif
    @if($order->pdf)
        <p>Untuk mendownload pdf scoring, klik : </p><a href="{{ asset('storage/'.$order->pdf) }}">disini</a>
    @endif
  </div>


@endsection