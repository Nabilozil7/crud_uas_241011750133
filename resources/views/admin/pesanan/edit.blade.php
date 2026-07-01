@extends('admin.layoutsadmin')

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Edit Pesanan</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('pesanan.update',$pesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4 align-items-start">

                        <!-- FORM KIRI -->
                        <div class="col-lg-8">

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Nama Pemesan</label>
                                    <input type="text"
                                           name="nama_pemesan"
                                           class="form-control"
                                           value="{{ old('nama_pemesan',$pesanan->nama_pemesan) }}"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="{{ old('email',$pesanan->email) }}"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">No HP</label>
                                    <input type="text"
                                           name="no_hp"
                                           class="form-control"
                                           value="{{ old('no_hp',$pesanan->no_hp) }}"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Produk</label>
                                    <select name="produk_id"
                                            id="produk"
                                            class="form-select">

                                        @foreach($produk as $item)
                                            <option value="{{ $item->id }}"
                                                data-harga="{{ $item->harga }}"
                                                data-gambar="{{ asset('asset/gambar/produk/'.$item->gambar) }}"
                                                data-nama="{{ $item->nama_alat }}"
                                                {{ $pesanan->produk_id==$item->id ? 'selected':'' }}>
                                                {{ $item->nama_alat }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Harga</label>
                                    <input type="text"
                                           id="harga"
                                           class="form-control"
                                           readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number"
                                           id="jumlah"
                                           name="jumlah"
                                           class="form-control"
                                           value="{{ $pesanan->jumlah }}"
                                           min="1">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Total Harga</label>
                                    <input type="text"
                                           id="total"
                                           class="form-control"
                                           readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option {{ $pesanan->status=='Diproses'?'selected':'' }}>Diproses</option>
                                        <option {{ $pesanan->status=='Dikirim'?'selected':'' }}>Dikirim</option>
                                        <option {{ $pesanan->status=='Selesai'?'selected':'' }}>Selesai</option>
                                        <option {{ $pesanan->status=='Dibatalkan'?'selected':'' }}>Dibatalkan</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Keterangan</label>
                                    <textarea name="keterangan"
                                              class="form-control"
                                              rows="4">{{ $pesanan->keterangan }}</textarea>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-success px-4">
                                        Update
                                    </button>

                                    <a href="{{ route('pesanan.index') }}"
                                       class="btn btn-secondary">
                                        Kembali
                                    </a>
                                </div>

                            </div>

                        </div>

                        <!-- GAMBAR KANAN -->
                        <div class="col-lg-4 text-center">

                            <div class="border rounded p-3 shadow-sm">

                                <img id="gambarProduk"
                                     src="{{ asset('asset/gambar/produk/'.$pesanan->produk->gambar) }}"
                                     class="img-fluid rounded mb-3"
                                     style="width:100%; max-width:280px; height:280px; object-fit:contain;">

                                <h5 id="namaProduk" class="fw-bold text-success">
                                    {{ $pesanan->produk->nama_alat }}
                                </h5>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

<script>

function hitung(){

    let produk = document.getElementById('produk');
    let option = produk.options[produk.selectedIndex];

    let harga = parseInt(option.dataset.harga) || 0;
    let jumlah = parseInt(document.getElementById('jumlah').value) || 1;

    document.getElementById('harga').value =
        'Rp ' + harga.toLocaleString('id-ID');

    document.getElementById('total').value =
        'Rp ' + (harga * jumlah).toLocaleString('id-ID');

    document.getElementById('gambarProduk').src =
        option.dataset.gambar;

    document.getElementById('namaProduk').innerText =
        option.dataset.nama;
}

document.getElementById('produk').addEventListener('change', hitung);
document.getElementById('jumlah').addEventListener('input', hitung);

hitung();

</script>

@endsection