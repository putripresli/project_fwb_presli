@extends('Admin.master')

@section('konten')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Hubungi Driver</h1>

    <form action="{{ route('kirim-pesan-driver') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="driver_id">Pilih Driver</label>
            <select name="driver_id" class="form-control" required>
                <option value="">-- Pilih Driver --</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pesan">Pesan / Instruksi</label>
            <textarea name="pesan" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
