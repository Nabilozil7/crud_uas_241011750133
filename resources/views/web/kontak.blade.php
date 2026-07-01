@extends('layouts.app')

@section('title','Kontak')

@section('content')

<style>

.contact-header{
    background:linear-gradient(135deg,#198754,#28a745);
    color:#fff;
    border-radius:25px;
    padding:60px;
    margin-bottom:50px;
}

.contact-card{
    border:none;
    border-radius:20px;
    transition:.3s;
}

.contact-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.icon-contact{
    width:65px;
    height:65px;
    border-radius:50%;
    background:#198754;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
    margin-bottom:15px;
}

.form-control,
textarea{
    border-radius:12px;
}

.btn-success{
    border-radius:12px;
}

iframe{
    border-radius:20px;
}

.social a{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#198754;
    color:white;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    text-decoration:none;
    margin:8px;
    font-size:22px;
    transition:.3s;
}

.social a:hover{
    background:#146c43;
    transform:translateY(-4px);
}

</style>

<div class="contact-header text-center">
    
         <h1 class="fw-bold">AKEKA</h1>
    <img src="{{ asset('asset/gambar/logo/akk.png') }}"
         width="90"
         class="mb-3">


    <h1 class="fw-bold">
        Hubungi Kami
    </h1>

    <p class="lead">

        Kami siap membantu kebutuhan alat kebersihan kantor Anda.
        Jangan ragu untuk menghubungi tim AKEKA.

    </p>

</div>

<div class="row">

    <div class="col-lg-5 mb-4">

        <div class="card contact-card shadow">

            <div class="card-body p-4">

                <h3 class="fw-bold text-success mb-4">

                    Informasi Kontak

                </h3>

                <div class="d-flex mb-4">

                    <div class="icon-contact">
                        📍
                    </div>

                    <div class="ms-3">

                        <h5>Alamat</h5>

                        <p>
                            Jl. Raya Kebersihan No.123,
                            Tangerang, Banten
                        </p>

                    </div>

                </div>

                <div class="d-flex mb-4">

                    <div class="icon-contact">
                        📞
                    </div>

                    <div class="ms-3">

                        <h5>Telepon</h5>

                        <p>0812-3456-7890</p>

                    </div>

                </div>

                <div class="d-flex mb-4">

                    <div class="icon-contact">
                        ✉️
                    </div>

                    <div class="ms-3">

                        <h5>Email</h5>

                        <p>info@akeka.com</p>

                    </div>

                </div>

                <div class="d-flex">

                    <div class="icon-contact">
                        🕒
                    </div>

                    <div class="ms-3">

                        <h5>Jam Operasional</h5>

                        <p>
                            Senin - Jumat<br>
                            08.00 - 17.00 WIB
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-7">

        <div class="card contact-card shadow">

            <div class="card-body p-4">

                <h3 class="fw-bold text-success mb-4">

                    Kirim Pesan

                </h3>

                <form>

                    <div class="mb-3">

                        <label>Nama</label>

                        <input type="text"
                               class="form-control"
                               placeholder="Masukkan nama">

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                               class="form-control"
                               placeholder="Masukkan email">

                    </div>

                    <div class="mb-3">

                        <label>Subjek</label>

                        <input type="text"
                               class="form-control"
                               placeholder="Masukkan subjek">

                    </div>

                    <div class="mb-3">

                        <label>Pesan</label>

                        <textarea class="form-control"
                                  rows="5"
                                  placeholder="Tulis pesan..."></textarea>

                    </div>

                    <button class="btn btn-success w-100">

                        Kirim Pesan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<div class="mt-5">

    <h3 class="text-center fw-bold text-success mb-4">

        Lokasi Kami

    </h3>

    <iframe
        src="https://www.google.com/maps?q=Tangerang&output=embed"
        width="100%"
        height="400"
        style="border:0;"
        loading="lazy">
    </iframe>

</div>

<div class="text-center mt-5">

    <h3 class="fw-bold text-success">

        Ikuti Kami

    </h3>

    <div class="social mt-3">

        <a href="#">📘</a>
        <a href="#">📸</a>
        <a href="#">💬</a>
        <a href="#">▶️</a>

    </div>

</div>

@endsection