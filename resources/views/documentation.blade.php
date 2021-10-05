@extends('template.main')

@section('container')
<h2 style="font-family: Phantomsans, sans-serif;text-align: center;" class="mt-3">
Dokumentasi Musik yang Pernah Dipesan</h2>
@if($orders->count())
    <div class="card mt-4 mb-3">
        @foreach($orders as $order)
        <div style="max-height: 720px; overflow:hidden;">
            <center><video width="640" height="480" controls>
                <source src="{{ asset('storage/'.$order->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            </center>
        </div>
        <div class="card-body text-center">
            <h3 class="card-title">{{ $order->judul_lagu }}</h3>
            <p>
                <small> Dipesan oleh : {{ $order->author->unit_mb }}</a>
                {{ $order->created_at->diffForHumans() }}
                </small>
            </p>
        </div>
    </div>
    @endforeach
@else
    <p class="text-center fs-4" >Post not Found...</p>
@endif
    <div class="d-flex justify-content-center">
    {{ $orders->links() }}
    </div>
@endsection