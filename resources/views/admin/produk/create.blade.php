@extends('admin.layoutsadmin')

@section('title','Tambah Produk')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- KIRI -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">ID Alat</label>
                            <input type="text" name="id_alat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <input type="text" name="jenis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                    </div>

                    <!-- KANAN -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <select name="kondisi" class="form-select" required>
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="Baru">Baru</option>
                                <option value="Baru (Segel)">Baru (Segel)</option>
                                <option value="Open Box">Open Box</option>
                                <option value="Refurbished">Refurbished</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Stok</label>
                            <select name="status" class="form-select" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Hampir Habis">Hampir Habis</option>
                                <option value="Pre Order">Pre Order</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lokasi Gudang</label>
                            <select name="lokasi" class="form-select" required>
                                <option value="">-- Pilih Gudang --</option>
                                <option value="Gudang Pusat">Gudang Pusat</option>
                                <option value="Gudang Jakarta">Gudang Jakarta</option>
                                <option value="Gudang Tangerang">Gudang Tangerang</option>
                                <option value="Gudang Bandung">Gudang Bandung</option>
                                <option value="Gudang Surabaya">Gudang Surabaya</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <button class="btn btn-success px-4">
                        Simpan
                    </button>

                    <a href="{{ route('produk.index') }}"
                       class="btn btn-secondary px-4">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection