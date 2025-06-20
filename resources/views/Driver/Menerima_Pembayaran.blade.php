@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Riwayat Pembayaran</h3>

    @if(count($pembayaran) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $bayar)
                    <tr>
                        <td>{{ $bayar->user->nama }}</td>
                        <td>Rp {{ number_format($bayar->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $bayar->status }}</td>
                        <td>{{ $bayar->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada pembayaran yang masuk.</p>
    @endif
</div>
@endsection
