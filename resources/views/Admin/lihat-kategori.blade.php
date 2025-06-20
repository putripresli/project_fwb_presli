 @extends('Admin.master')

@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lihat Transportasi</h1>
    <p class="mb-4">Berikut adalah daftar semua transportasi yang tersedia di sistem.</p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Transportasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Transportasi</th>
                            <th>Jenis</th>
                            <th>Kapasitas</th>
                            <th>Harga per KM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transportasi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_transportasi }}</td>
                            <td>{{ $item->jenis_transportasi }}</td>
                            <td>{{ $item->kapasitas }}</td>
                            <td>Rp{{ number_format($item->harga_per_km, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('edit-transportasi', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('hapus-transportasi', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus transportasi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
