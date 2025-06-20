@extends('Admin.master')

@section('konten')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Update Transportasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update-transportasi', $transportasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_transportasi">Nama Transportasi</label>
            <input type="text" name="nama_transportasi" class="form-control" value="{{ old('nama_transportasi', $transportasi->nama_transportasi) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_transportasi">Jenis Transportasi</label>
            <input type="text" name="jenis_transportasi" class="form-control" value="{{ old('jenis_transportasi', $transportasi->jenis_transportasi) }}" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $transportasi->kapasitas) }}" required>
        </div>

        <div class="form-group">
            <label for="harga_per_km">Harga per KM</label>
            <input type="number" name="harga_per_km" class="form-control" value="{{ old('harga_per_km', $transportasi->harga_per_km) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('lihat-transportasi') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
