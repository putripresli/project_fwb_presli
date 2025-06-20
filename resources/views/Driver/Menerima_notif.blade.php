@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Notifikasi Masuk</h3>

    @if(count($notifikasi) > 0)
        <ul class="list-group">
            @foreach($notifikasi as $notif)
                <li class="list-group-item">
                    <strong>Dari: {{ $notif->dari }}</strong> <br>
                    {{ $notif->pesan }}
                    <span class="badge bg-secondary float-end">{{ $notif->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada notifikasi.</p>
    @endif
</div>
@endsection
