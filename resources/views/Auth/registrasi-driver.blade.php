@extends('master')

@section('konten')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-3">
        <div class="card-header bg-success text-white text-center">
          <h4>Registrasi Sebagai Driver</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('registrasi.driver') }}">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" name="name" id="name"
                     class="form-control @error('name') is-invalid @enderror"
                     value="{{ old('name') }}" required autofocus>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email"
                     class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password"
                     class="form-control @error('password') is-invalid @enderror" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" id="password_confirmation"
                     class="form-control" required>
            </div>

            <!-- Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-success">Daftar</button>
            </div>
          </form>

          <hr>
          <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
