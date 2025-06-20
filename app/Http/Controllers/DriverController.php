<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\Pemesanan;
use App\Models\Pembayaran;

class DriverController extends Controller
{
    // Menampilkan notifikasi dari admin/user
    public function notifikasi()
    {
        $notifikasi = Notifikasi::where('role_tujuan', 'driver')->latest()->get();
        return view('driver.notifikasi', compact('notifikasi'));
    }

    // Menampilkan daftar pesanan yang perlu dikonfirmasi
    public function konfirmasiView()
    {
        $pemesanan = Pemesanan::where('status', 'menunggu')->orWhere('status', 'dikonfirmasi')->get();
        return view('driver.konfirmasi', compact('pemesanan'));
    }

    // Konfirmasi pesanan dari user
    public function konfirmasi($id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $pesanan->status = 'dikonfirmasi';
        $pesanan->save();

        return redirect()->route('driver.konfirmasi.view')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    // Melihat riwayat pembayaran dari user
    public function pembayaran()
    {
        $pembayaran = Pembayaran::where('driver_id', auth()->id())->latest()->get();
        return view('driver.pembayaran', compact('pembayaran'));
    }
}
