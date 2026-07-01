@extends('admin.layoutsadmin')

@section('title','Edit Produk')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Edit Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('produk.update',$produk->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4 align-items-start">

                    <!-- GAMBAR -->
                    <div class="col-lg-4 text-center">

                        <div class="border rounded p-3 shadow-sm">

                            <img
                                id="preview"
                                src="{{ asset('asset/gambar/produk/'.$produk->gambar) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; max-width:280px; height:280px; object-fit:contain;">

                            <label class="form-label fw-bold">Ganti Gambar</label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control"
                                accept="image/*"
                                onchange="previewImage(event)">

                        </div>

                    </div>

                    <!-- FORM -->
                    <div class="col-lg-8">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">ID Alat</label>
                                <input type="text" name="id_alat"
                                       class="form-control"
                                       value="{{ old('id_alat',$produk->id_alat) }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama_alat"
                                       class="form-control"
                                       value="{{ old('nama_alat',$produk->nama_alat) }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Jenis</label>
                                <input type="text" name="jenis"
                                       class="form-control"
                                       value="{{ old('jenis',$produk->jenis) }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kondisi</label>
                                <input type="text" name="kondisi"
                                       class="form-control"
                                       value="{{ old('kondisi',$produk->kondisi) }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option {{ $produk->status=='Tersedia'?'selected':'' }}>Tersedia</option>
                                    <option {{ $produk->status=='Hampir Habis'?'selected':'' }}>Hampir Habis</option>
                                    <option {{ $produk->status=='Pre Order'?'selected':'' }}>Pre Order</option>
                                    <option {{ $produk->status=='Habis'?'selected':'' }}>Habis</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi"
                                       class="form-control"
                                       value="{{ old('lokasi',$produk->lokasi) }}"
                                       required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Harga</label>
                                <input type="number" name="harga"
                                       class="form-control"
                                       value="{{ old('harga',$produk->harga) }}"
                                       required>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-success px-4">
                                    Update Produk
                                </button>

                                <a href="{{ route('produk.index') }}"
                                   class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

</div>

<script>
function previewImage(event){
    document.getElementById('preview').src =
        URL.createObjectURL(event.target.files[0]);
}
</script>

@endsection