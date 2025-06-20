<?php

namespace App\Models;
use App\Models\Notifikasi;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;


class Notifikasi extends Model
{
    protected $fillable = ['judul', 'pesan', 'role_tujuan'];
}

class Pemesanan extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'lokasi', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}

class Pembayaran extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'jumlah', 'metode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}


