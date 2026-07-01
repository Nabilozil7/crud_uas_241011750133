@extends('admin.layoutsadmin')

@section('title', 'Data Pesanan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">
            Data Pesanan
        </h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
         <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('pesanan.pdf') }}" class="btn btn-danger me-2" target="_blank">
                    Cetak PDF
                </a>
            </div>

            <div class="table-responsive">
                   

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($pesanan as $item)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>{{ $item->nama_pemesan }}</td>

                            <td>{{ $item->email }}</td>

                            <td>{{ $item->no_hp }}</td>

                            <td>
                                {{ $item->produk->nama_alat ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $item->jumlah }}
                            </td>
                            <td>
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $item->keterangan }}
                            </td>

                            <td class="text-center">

                                @if($item->status == 'Diproses')
                                    <span class="badge bg-warning text-dark">
                                        Diproses
                                    </span>

                                @elseif($item->status == 'Dikirim')
                                    <span class="badge bg-primary">
                                        Dikirim
                                    </span>

                                @elseif($item->status == 'Selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @elseif($item->status == 'Dibatalkan')
                                    <span class="badge bg-danger">
                                        Dibatalkan
                                    </span>

                                @else
                                    <span class="badge bg-secondary">
                                        -
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('pesanan.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('pesanan.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center">
                                Belum ada data pesanan.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection