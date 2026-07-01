@extends('admin.layoutsadmin')

@section('title','Dashboard')

@section('content')

<style>

.dashboard-card{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.dashboard-card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 25px rgba(0,0,0,.15);
}

.dashboard-icon{
    position:absolute;
    top:15px;
    right:20px;
    font-size:45px;
    opacity:.2;
}

.card-body{
    position:relative;
}

.card{
    border-radius:18px;
}

.card-header{
    font-weight:bold;
}

.table thead{
    background:#198754;
    color:#fff;
}

.table thead th{
    border:none;
}

.badge{
    padding:7px 12px;
    font-size:13px;
}

</style>

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-success">
            Dashboard AKEKA
        </h2>

        <p class="text-muted">
            Welcome
            <b>{{ session('admin_nama') }}</b>
        </p>

    </div>

    <!-- CARD STATISTIK -->

    <div class="row g-4 mb-4">

        <div class="col-lg-6">

    <div class="row g-4">

        <!-- Total Produk -->
        <div class="col-6">
            <div class="card dashboard-card bg-success text-white shadow">
                <div class="card-body">
                    <div class="dashboard-icon">📦</div>
                    <h6>Total Produk</h6>
                    <h2 class="fw-bold">{{ $totalProduk }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="col-6">
            <div class="card dashboard-card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="dashboard-icon">🛒</div>
                    <h6>Total Pesanan</h6>
                    <h2 class="fw-bold">{{ $totalPesanan }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>


        <!-- TOTAL TERJUAL -->
        <div class="col-6">

            <div class="card dashboard-card bg-danger text-white shadow">

                <div class="card-body text-center">

                    <div class="dashboard-icon">📈</div>

                    <h6>Total Barang Terjual</h6>

                    <h2 class="fw-bold">
                        {{ $totalTerjual }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>

        <!-- TOTAL PENDAPATAN -->
        <div class="col-12 mb-4">

            <div class="card dashboard-card bg-warning text-dark shadow">

                <div class="card-body text-center">

                    <div class="dashboard-icon">💰</div>

                    <h6>Total Pendapatan</h6>

                    <h1 class="fw-bold display-6">
                        Rp {{ number_format($totalPendapatan,0,',','.') }}
                    </h1>

                </div>

            </div>

        </div>


    <!-- GRAFIK -->

    <div class="row">

        <div class="col-lg-8 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    Grafik Status Pesanan

                </div>

                <div class="card-body">

                    <canvas id="chartPesanan" height="220"></canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white">

                    Ringkasan Status

                </div>

                <div class="card-body">

                    <div class="list-group list-group-flush">

                        <div class="list-group-item d-flex justify-content-between">

                            <span>⏳ Diproses</span>

                            <span class="badge bg-warning text-dark">

                                {{ $diproses }}

                            </span>

                        </div>

                        <div class="list-group-item d-flex justify-content-between">

                            <span>🚚 Dikirim</span>

                            <span class="badge bg-primary">

                                {{ $dikirim }}

                            </span>

                        </div>

                        <div class="list-group-item d-flex justify-content-between">

                            <span>✅ Selesai</span>

                            <span class="badge bg-success">

                                {{ $selesai }}

                            </span>

                        </div>

                        <div class="list-group-item d-flex justify-content-between">

                            <span>❌ Dibatalkan</span>

                            <span class="badge bg-danger">

                                {{ $dibatalkan }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
        <!-- PESANAN TERBARU -->

    <div class="card shadow border-0 mb-4">

        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

            <span>Pesanan Terbaru</span>

            <span class="badge bg-light text-success">
                {{ count($pesananTerbaru) }} Data
            </span>

        </div>

        <div class="card-body">

            @if($pesananTerbaru->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pesananTerbaru as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <strong>{{ $item->nama_pemesan }}</strong>

                            </td>

                            <td>

                                {{ $item->produk->nama_alat }}

                            </td>

                            <td>

                                {{ $item->jumlah }}

                            </td>

                            <td>

                                <strong class="text-success">

                                    Rp {{ number_format($item->total_harga,0,',','.') }}

                                </strong>

                            </td>

                            <td>

                                @if($item->status=='Diproses')

                                    <span class="badge bg-warning text-dark">
                                        Diproses
                                    </span>

                                @elseif($item->status=='Dikirim')

                                    <span class="badge bg-primary">
                                        Dikirim
                                    </span>

                                @elseif($item->status=='Selesai')

                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Dibatalkan
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

                <div class="text-center py-5">

                    <h5 class="text-muted">

                        Belum ada pesanan.

                    </h5>

                </div>

            @endif

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chartPesanan');

new Chart(ctx, {

    type: 'pie',

    data: {

        labels: [

            'Diproses',

            'Dikirim',

            'Selesai',

            'Dibatalkan'

        ],

        datasets: [{

            data: [

                {{ $diproses }},

                {{ $dikirim }},

                {{ $selesai }},

                {{ $dibatalkan }}

            ],

            backgroundColor: [

                '#ffc107',

                '#0d6efd',

                '#198754',

                '#dc3545'

            ],

            borderWidth: 2

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                position: 'bottom'

            }

        },
        maintainAspectRatio: false

    }

});

</script>

@endsection