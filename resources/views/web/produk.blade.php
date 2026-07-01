@extends('layouts.app')

@section('title','Produk')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold text-success">
            Produk Alat Kebersihan
        </h2>

        <p class="text-muted">
            Temukan berbagai alat kebersihan berkualitas untuk kebutuhan kantor Anda.
        </p>

    </div>

    <div class="row">

        @forelse($produk as $item)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <img src="{{ asset('asset/gambar/produk/'.$item->gambar) }}"
                     class="card-img-top"
                     style="height:300px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">
                        {{ $item->nama_alat }}
                    </h5>

                    <p class="text-muted mb-1">
                        Jenis :
                        {{ $item->jenis }}
                    </p>

                    <p class="text-muted mb-1">
                        Rp {{ number_format($item->harga,0,',','.') }}
                    </p>

                    <p>

                        @if($item->status=="Tersedia")

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                        @elseif($item->status=="Hampir Habis")

                            <span class="badge bg-warning text-dark">
                                Hampir Habis
                            </span>

                        @elseif($item->status=="Pre Order")

                            <span class="badge bg-info text-dark">
                                Pre Order
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Habis
                            </span>

                        @endif

                    </p>

                </div>

                        <a href="{{ route('order', $item->id) }}" class="btn btn-success">
                            Pesan Sekarang
                        </a>
                </div>

            

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center">

                Belum ada produk.

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection