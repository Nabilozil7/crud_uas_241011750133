
@extends('layouts.app')

@section('content')

<div class="container py-5">
     

    <div class="row">

        <!-- Detail Produk -->
        <div class="col-lg-5 mb-4">

            <div class="card shadow border-0 rounded-4">

                <img src="{{ asset('asset/gambar/produk/'.$produk->gambar) }}"
                     class="card-img-top p-4"
                     style="height:350px;object-fit:contain;">

                <div class="card-body">

                    <h3 class="fw-bold text-success">
                        {{ $produk->nama_alat }}
                    </h3>

                    <table class="table table-borderless mt-3">

                        <tr>
                            <th width="40%">ID Alat</th>
                            <td>{{ $produk->id_alat }}</td>
                        </tr>

                        <tr>
                            <th>Jenis</th>
                            <td>{{ $produk->jenis }}</td>
                        </tr>

                        <tr>
                            <th>Kondisi</th>
                            <td>{{ $produk->kondisi }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                @if($produk->status=='Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($produk->status=='Hampir Habis')
                                    <span class="badge bg-warning text-dark">Hampir Habis</span>
                                @elseif($produk->status=='Pre Order')
                                    <span class="badge bg-primary">Pre Order</span>
                                @else
                                    <span class="badge bg-danger">Habis</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $produk->lokasi }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td class="fw-bold text-success">
                                Rp {{ number_format($produk->harga,0,',','.') }}
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>


       

        <!-- Form -->
        <div class="col-lg-7">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-success text-white py-3">

                    <h4 class="mb-0">
                        Form Pemesanan
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('order.store') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="produk_id"
                               value="{{ $produk->id }}">

                        <input type="hidden"
                               id="harga"
                               value="{{ $produk->harga }}">

                        <div class="mb-3">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text"
                                   name="nama_pemesan"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <textarea name="alamat_pengiriman"
                                      class="form-control"
                                      rows="3"
                                      required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jumlah Pesanan</label>

                            <input
                                 type="text"
                                    name="jumlah"
                                    id="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    value="{{ old('jumlah', 1) }}"
                                    inputmode="numeric"
                                    maxlength="3"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,''); hitungTotal();"
                                    required>

                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total Harga</label>
                            <input type="text"
                                   id="total"
                                   class="form-control"
                                   readonly>

                            <input type="hidden"
                                   name="total_harga"
                                   id="total_hidden">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea name="keterangan"
                                      class="form-control"
                                      rows="3"></textarea>
                        </div>

                        <button class="btn btn-success btn-lg w-100">
                            Pesan Sekarang
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function hitungTotal(){

    let harga = parseInt(document.getElementById('harga').value);

    let jumlah = parseInt(document.getElementById('jumlah').value);

    let total = harga * jumlah;

    document.getElementById('total').value =
        'Rp ' + total.toLocaleString('id-ID');

    document.getElementById('total_hidden').value = total;

}

document.getElementById('jumlah').addEventListener('input', hitungTotal);

hitungTotal();

</script>


@endsection

