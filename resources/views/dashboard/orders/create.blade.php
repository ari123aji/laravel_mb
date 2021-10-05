@extends('dashboard.template.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Pesanan Anda</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/orders">
    @csrf
        <div class="mb-3 mt-3">
            <label for="judul_lagu" class="form-label">Judul Lagu</label>
            <input type="text" class="form-control @error('judul_lagu') is-invalid @enderror" id="judul_lagu" name="judul_lagu"
             required autofocus value="{{ old('judul_lagu') }}">
            @error('judul_lagu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="trumpet" class="form-label">Trumpet</label>
            <input type="text" class="form-control @error('trumpet') is-invalid @enderror" id="trumpet" name="trumpet"
              autofocus value="{{ old('trumpet') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="mello" class="form-label">Mellophone</label>
            <input type="text" class="form-control @error('mello') is-invalid @enderror" id="mello" name="mello"
              autofocus value="{{ old('mello') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="baritone" class="form-label">Baritone</label>
            <input type="text" class="form-control @error('baritone') is-invalid @enderror" id="baritone" name="baritone"
              autofocus value="{{ old('baritone') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="tuba" class="form-label">Tuba</label>
            <input type="text" class="form-control @error('tuba') is-invalid @enderror" id="tuba" name="tuba"
              autofocus value="{{ old('tuba') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="marimba" class="form-label">Marimba</label>
            <input type="text" class="form-control @error('marimba') is-invalid @enderror" id="marimba" name="marimba"
              autofocus value="{{ old('marimba') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="vibraphone" class="form-label">Vibraphone</label>
            <input type="text" class="form-control @error('vibraphone') is-invalid @enderror" id="vibraphone" name="vibraphone"
              autofocus value="{{ old('vibraphone') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="xylophone" class="form-label">xylophone</label>
            <input type="text" class="form-control @error('xylophone') is-invalid @enderror" id="xylophone" name="xylophone"
              autofocus value="{{ old('xylophone') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="glockenspiel" class="form-label">Glockenspiel</label>
            <input type="text" class="form-control @error('glockenspiel') is-invalid @enderror" id="glockenspiel" name="glockenspiel"
              autofocus value="{{ old('glockenspiel') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="snare" class="form-label">Snare Drum</label>
            <input type="text" class="form-control @error('snare') is-invalid @enderror" id="snare" name="snare"
              autofocus value="{{ old('snare') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="multitenor" class="form-label">Multitenor</label>
            <input type="text" class="form-control @error('multitenor') is-invalid @enderror" id="multitenor" name="multitenor"
              autofocus value="{{ old('multitenor') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="bassdrum" class="form-label">Bass Drum</label>
            <input type="text" class="form-control @error('bassdrum') is-invalid @enderror" id="bassdrum" name="bassdrum"
              autofocus value="{{ old('bassdrum') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="deadline" class="form-label">Deadline (hari/bulan)</label>
            <input type="text" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline"
             required autofocus value="{{ old('deadline') }}">
            @error('deadline')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="pesan_a" class="form-label">Pesan ke arranger</label>
            <input id="pesan_a" type="hidden" name="pesan_a" class="@error('pesan_a') is-invalid @enderror" required value="{{ old('pesan_a') }}">
            <trix-editor input="pesan_a"></trix-editor>
            @error('pesan_a')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> 

        <button type="submit" class="btn btn-primary mb-3">Buat Pesanan</button>
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

</script>

@endsection