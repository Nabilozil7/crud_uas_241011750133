@extends('admin.layoutsadmin')

@section('title', 'Data Produk')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Data Produk</h3>
       <div class="d-flex mr-3 gap-2">
            <a href="{{ route('produk.create') }}" class="btn btn-success">
                + Tambah Produk
            </a>
            <a href="{{ route('admin.Pdf') }}" class="btn btn-danger" target="_blank">
                Cetak PDF
            </a>
        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>ID Alat</th>
                            <th>Nama Alat</th>
                            <th>Jenis</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($produk as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if($item->gambar)
                                    <img src="{{ asset('asset/gambar/produk/'.$item->gambar) }}"
                                         width="80" height="80" class="rounded border" style="object-fit:cover;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $item->id_alat }}</td>
                            <td class="fw-semibold">{{ $item->nama_alat }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $item->kondisi }}</span>
                            </td>
                            <td class="text-center">
                                @if($item->status == 'Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($item->status == 'Hampir Habis')
                                    <span class="badge bg-warning text-dark">Hampir Habis</span>
                                @elseif($item->status == 'Pre Order')
                                    <span class="badge bg-info text-dark">Pre Order</span>
                                @else
                                    <span class="badge bg-danger">Habis</span>
                                @endif
                            </td>
                            <td>{{ $item->lokasi }}</td>
                            <td class="fw-bold text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">Data produk masih kosong.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
