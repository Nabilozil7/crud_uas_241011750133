@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>.hero-img{
    max-width:100%;
    height:430px;
    object-fit:cover;
    border-radius:25px;
    transition:.4s;
    cursor:pointer;
}

.hero-img:hover{
    transform:scale(1.03);
    box-shadow:0 20px 45px rgba(0,0,0,.25);
}</style>

<div class="bg-success text-white rounded-4 p-5 mb-5">
    <div class="row align-items-center">

        <div class="col-lg-6">
            <h1 class="fw-bold mb-3">Selamat Datang di AKEKA</h1>

            <p class="mb-4">
                AKEKA adalah platform penyedia alat kebersihan kantor yang menawarkan berbagai produk berkualitas untuk memenuhi kebutuhan kebersihan di lingkungan perkantoran. Melalui sistem ini, pelanggan dapat melihat informasi produk, mengecek ketersediaan stok, dan melakukan pemesanan secara mudah, cepat, dan praktis.
            </p>

            <a href="/produk" class="btn btn-light me-2">
                Lihat Produk
            </a>

            <a href="/produk" class="btn btn-outline-light">
                Order Sekarang
            </a>
        </div>
<div class="col-lg-6 text-center">

    <img src="{{ asset('asset/gambar/image/kantor.jpeg') }}"
         class="img-fluid hero-img shadow-lg rounded-4"
         alt="AKEKA"
         data-aos="zoom-in">

</div>

    </div>
</div>

<div class="row text-center mb-5">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2>50+</h2>
                <p class="mb-0">Data Produk</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2>10</h2>
                <p class="mb-0">Jenis Alat</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2>100+</h2>
                <p class="mb-0">Pemesanan</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2>20</h2>
                <p class="mb-0">Mitra</p>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-4">

        <h3 class="fw-bold">Tentang AKEKA</h3>

        <p>
           AKEKA berkomitmen menyediakan berbagai alat kebersihan kantor dengan kualitas terbaik untuk mendukung lingkungan kerja yang bersih, sehat, dan nyaman. Kami menghadirkan sistem yang memudahkan pelanggan dalam melihat informasi produk, mengetahui ketersediaan stok, serta melakukan pemesanan secara efisien.
        </p>

    </div>

    <div class="col-md-6">

        <h3 class="fw-bold">Keunggulan</h3>

        <ul class="list-group">

            <li class="list-group-item">Produk Berkualitas dan Terjamin</li>

            <li class="list-group-item">Informasi Stok Selalu Terbarui</li>

            <li class="list-group-item">Proses Pemesanan Mudah</li>

            <li class="list-group-item">Pelayanan Cepat dan Ramah</li>

        </ul>

    </div>

</div>

<div class="bg-light rounded-4 p-5 mt-5 text-center">

    <h2 class="fw-bold">
        Siap Memesan Alat Kebersihan?
    </h2>

    <p>
        Lihat daftar produk yang tersedia dan lakukan pemesanan dengan mudah.
    </p>

    <a href="/produk" class="btn btn-success">
        Lihat Produk
    </a>

</div>

@endsection