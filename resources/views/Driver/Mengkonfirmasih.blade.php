@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Konfirmasi Pemesanan</h3>

    @if(count($pemesanan) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemesanan as $pesan)
                    <tr>
                        <td>{{ $pesan->user->nama }}</td>
                        <td>{{ $pesan->lokasi }}</td>
                        <td>{{ $pesan->status }}</td>
                        <td>
                            @if($pesan->status == 'menunggu')
                                <form action="{{ route('driver.konfirmasi', $pesan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                </form>
                            @else
                                Sudah dikonfirmasi
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada pemesanan yang perlu dikonfirmasi.</p>
    @endif
</div>
@endsection
