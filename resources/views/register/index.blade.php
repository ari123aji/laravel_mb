@extends('template.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
          <form action="/register" method="post">
          @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
              <label for="name">Name</label>
              @error('name') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="alamat" required value="{{ old('alamat') }}">
              <label for="alamat">Alamat</label>
              @error('alamat') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="no_hp" required value="{{ old('no_hp') }}">
              <label for="no_hp">Nomor HP Aktif</label>
              @error('no_hp') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="unit_mb" class="form-control @error('unit_mb') is-invalid @enderror" id="unit_mb" placeholder="unit_mb" required value="{{ old('unit_mb') }}">
              <label for="unit_mb">Unit Marching Band</label>
              @error('unit_mb') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for="email">Email</label>
              @error('email') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password') <div class="invalid-feedback">
                {{ $message }}
              </div> @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
          </form>
          <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
        </main>
    </div>
</div>


@endsection