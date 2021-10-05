@extends('admin.template.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pesanan Milik : {{ $order->author->name }}</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/orders/{{ $order->slug }}" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="mb-3 mt-3">
            <label for="judul_lagu" class="form-label">Judul Lagu</label>
            <input type="text" class="form-control @error('judul_lagu') is-invalid @enderror" id="judul_lagu" name="judul_lagu"
             required autofocus value="{{ old('judul_lagu', $order->judul_lagu) }}">
            @error('judul_lagu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $order->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> 
        <div class="mb-3 mt-3">
            <label for="trumpet" class="form-label">Trumpet</label>
            <input type="text" class="form-control @error('trumpet') is-invalid @enderror" id="trumpet" name="trumpet"
              autofocus value="{{ old('trumpet', $order->trumpet) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="mello" class="form-label">Mellophone</label>
            <input type="text" class="form-control @error('mello') is-invalid @enderror" id="mello" name="mello"
              autofocus value="{{ old('mello', $order->mello) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="baritone" class="form-label">Baritone</label>
            <input type="text" class="form-control @error('baritone') is-invalid @enderror" id="baritone" name="baritone"
              autofocus value="{{ old('baritone', $order->baritone) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="tuba" class="form-label">Tuba</label>
            <input type="text" class="form-control @error('tuba') is-invalid @enderror" id="tuba" name="tuba"
              autofocus value="{{ old('tuba', $order->tuba) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="marimba" class="form-label">Marimba</label>
            <input type="text" class="form-control @error('marimba') is-invalid @enderror" id="marimba" name="marimba"
              autofocus value="{{ old('marimba', $order->marimba) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="vibraphone" class="form-label">Vibraphone</label>
            <input type="text" class="form-control @error('vibraphone') is-invalid @enderror" id="vibraphone" name="vibraphone"
              autofocus value="{{ old('vibraphone', $order->vibraphone) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="xylophone" class="form-label">xylophone</label>
            <input type="text" class="form-control @error('xylophone') is-invalid @enderror" id="xylophone" name="xylophone"
              autofocus value="{{ old('xylophone', $order->xylophone) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="glockenspiel" class="form-label">Glockenspiel</label>
            <input type="text" class="form-control @error('glockenspiel') is-invalid @enderror" id="glockenspiel" name="glockenspiel"
              autofocus value="{{ old('glockenspiel', $order->glockenspiel) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="snare" class="form-label">Snare Drum</label>
            <input type="text" class="form-control @error('snare') is-invalid @enderror" id="snare" name="snare"
              autofocus value="{{ old('snare', $order->snare) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="multitenor" class="form-label">Multitenor</label>
            <input type="text" class="form-control @error('multitenor') is-invalid @enderror" id="multitenor" name="multitenor"
              autofocus value="{{ old('multitenor', $order->multitenor) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="bassdrum" class="form-label">Bass Drum</label>
            <input type="text" class="form-control @error('bassdrum') is-invalid @enderror" id="bassdrum" name="bassdrum"
              autofocus value="{{ old('bassdrum', $order->bassdrum) }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="deadline" class="form-label">Deadline (hari/bulan)</label>
            <input type="text" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline"
              autofocus value="{{ old('deadline', $order->deadline) }}">
            @error('deadline')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status_id') is-invalid @enderror" name="status_id" required>
                @foreach ($statuses as $status)
                @if(old('status_id', $order->status_id) == $status->id)
                    <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                @else
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endif
                @endforeach
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="uang" id="harga" name="harga"
              autofocus value="{{ old('harga', $order->harga) }}">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <input id="pesan_a" type="hidden" name="pesan_a" class="@error('pesan_a') is-invalid @enderror" required value="{{ old('pesan_a', $order->pesan_a) }}">
            @error('pesan_a')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="video" class="form-label">Upload Video Scoring</label>
            <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video"
            value="{{ old('video', $order->video) }}">
        </div> 
        <div class="mb-3 mt-3">
            <label for="pdf" class="form-label">Upload Pdf Scoring</label>
            <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf" name="pdf"
            value="{{ old('pdf', $order->pdf) }}">
        </div> 
        <button type="submit" class="btn btn-primary mb-3">Update Pesanan</button>
    </form>
</div>
<script>
    const judul_lagu = document.querySelector('#judul_lagu');
    const slug = document.querySelector('#slug');

    judul_lagu.addEventListener('change', function() {
        fetch('/dashboard/orders/checkSlug?judul_lagu=' + judul_lagu.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

    var rupiah = document.getElementById('harga');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
</script>
@endsection