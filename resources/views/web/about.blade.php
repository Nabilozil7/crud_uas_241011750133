@extends('layouts.app')

@section('title','Tentang AKEKA')

@section('content')

<style>

.hero-about{
    background:linear-gradient(135deg,#198754,#28a745);
    border-radius:25px;
    color:#fff;
    padding:70px 50px;
    margin-bottom:60px;
}

.hero-about img{
     width:350px;
    max-width:100%;
    height:auto;
    transition:.4s;
}

.hero-about img:hover{
    transform:rotate(5deg) scale(1.05);
}

.about-img{
    border-radius:20px;
    overflow:hidden;
    transition:.4s;
}

.about-img img{
    width:100%;
    height:420px;
    object-fit:cover;
}

.about-img:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 45px rgba(0,0,0,.2);
}

.icon-box{
    width:75px;
    height:75px;
    border-radius:50%;
    background:#198754;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    margin:auto;
}

.feature-card{
    transition:.35s;
    border:none;
    border-radius:20px;
}

.feature-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.visi-misi{
    border-radius:20px;
    transition:.3s;
}

.visi-misi:hover{
    transform:translateY(-5px);
}

</style>

<div class="hero-about">

    <div class="row align-items-center">

        <div class="col-lg-8">

            <h1 class="display-5 fw-bold">
                Tentang AKEKA
            </h1>

            <p class="lead mt-3">

                AKEKA merupakan penyedia alat kebersihan kantor yang menyediakan
                berbagai produk berkualitas untuk memenuhi kebutuhan kebersihan
                perusahaan, perkantoran, sekolah maupun instansi lainnya.

                Kami berkomitmen memberikan pelayanan terbaik, proses pemesanan
                yang mudah, serta produk yang berkualitas sehingga menciptakan
                lingkungan kerja yang bersih, sehat, dan nyaman.

            </p>

        </div>

        <div class="col-lg-4 text-center">

            <img src="{{ asset('asset/gambar/logo/akk.png') }}" >

        </div>

    </div>

</div>



<div class="row align-items-center mb-5">

    <div class="col-lg-6">

        <div class="about-img">

            <img src="{{ asset('asset/gambar/image/clean.jpeg') }}">

        </div>

    </div>

    <div class="col-lg-6">

        <h2 class="fw-bold text-success mb-4">
            Profil Perusahaan
        </h2>

        <p>

            AKEKA hadir sebagai solusi bagi perusahaan yang membutuhkan
            berbagai alat kebersihan kantor dengan kualitas terbaik.

            Produk yang kami sediakan meliputi vacuum cleaner, trolley,
            alat pel, tempat sampah, perlengkapan toilet,
            hingga mesin pembersih modern.

        </p>

        <p>

            Melalui website ini pelanggan dapat melihat informasi produk,
            mengetahui ketersediaan stok, serta melakukan pemesanan
            secara online dengan cepat dan mudah.

        </p>

    </div>

</div>



<div class="row mb-5">

    <div class="col-md-6 mb-4">

        <div class="card shadow visi-misi h-100">

            <div class="card-body">

                <h3 class="text-success fw-bold">
                    Visi
                </h3>

                <p>

                    Menjadi perusahaan penyedia alat kebersihan kantor
                    yang terpercaya, profesional, dan berkualitas
                    di Indonesia.

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow visi-misi h-100">

            <div class="card-body">

                <h3 class="text-success fw-bold">
                    Misi
                </h3>

                <ul>

                    <li>Menyediakan produk berkualitas.</li>

                    <li>Memberikan pelayanan terbaik.</li>

                    <li>Mempermudah proses pemesanan.</li>

                    <li>Meningkatkan kepuasan pelanggan.</li>

                </ul>

            </div>

        </div>

    </div>

</div>



<h2 class="text-center fw-bold text-success mb-5">

    Mengapa Memilih AKEKA?

</h2>

<div class="row text-center">

    <div class="col-md-3 mb-4">

        <div class="card feature-card shadow h-100">

            <div class="card-body">

                <div class="icon-box">
                    ✓
                </div>

                <h5 class="mt-4 fw-bold">
                    Produk Berkualitas
                </h5>

                <p>
                    Semua produk dipilih dengan kualitas terbaik.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card feature-card shadow h-100">

            <div class="card-body">

                <div class="icon-box">
                    🚚
                </div>

                <h5 class="mt-4 fw-bold">
                    Pengiriman Cepat
                </h5>

                <p>
                    Pengiriman aman dan tepat waktu.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card feature-card shadow h-100">

            <div class="card-body">

                <div class="icon-box">
                    📦
                </div>

                <h5 class="mt-4 fw-bold">
                    Stok Lengkap
                </h5>

                <p>
                    Berbagai jenis alat kebersihan tersedia.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card feature-card shadow h-100">

            <div class="card-body">

                <div class="icon-box">
                    🤝
                </div>

                <h5 class="mt-4 fw-bold">
                    Pelayanan Terbaik
                </h5>

                <p>
                    Tim kami siap membantu kebutuhan pelanggan.
                </p>

            </div>

        </div>

    </div>

</div>



<div class="bg-light rounded-4 p-5 mt-5 text-center">

    <img src="{{ asset('asset/gambar/logo/akk.png') }}"
         width="80"
         class="mb-3">

    <h2 class="fw-bold">

        Bersama AKEKA,
        Kebersihan Menjadi Lebih Mudah

    </h2>

    <p class="mt-3">

        Kami percaya lingkungan kerja yang bersih dapat meningkatkan
        kenyamanan serta produktivitas.

        Mari percayakan kebutuhan alat kebersihan kantor Anda kepada AKEKA.

    </p>

    <a href="/produk" class="btn btn-success btn-lg px-5">

        Lihat Produk

    </a>

</div>

@endsection