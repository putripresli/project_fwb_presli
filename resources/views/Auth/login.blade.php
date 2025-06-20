@extends('master') {{-- Pastikan file layout utama kamu bernama main.blade.php --}}

@section('konten')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-3">
        <div class="card-header bg-primary text-white text-center">
          <h4>Login</h4>
        </div>
        <div class="card-body">
          @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email') }}" required autofocus>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password"
                     class="form-control @error('password') is-invalid @enderror" required>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <!-- Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>

          <hr>
          <p class="text-center">Belum punya akun?
            <a href="{{ route('register.user') }}">Daftar sebagai User</a> atau
            <a href="{{ route('register.driver') }}">Daftar sebagai Driver</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
