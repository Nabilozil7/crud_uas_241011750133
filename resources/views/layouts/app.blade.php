<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AKEKA | Penyedia Alat Kebersihan Kantor ')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/gaya.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
     
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="/">
        <img src="{{ asset('asset/gambar/logo/akk.png') }}"
            alt="Logo AKEKA"
            width="60"
            height="45"
            class="me-2 rounded-circle">

        <span>AKEKA</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/produk">Produk</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kontak">Kontak</a>
                </li>

                <li class="nav-item ms-2">
                    <a href="/login" class="nav-link">
                        Login
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<footer class="bg-success text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">
            © 2026 AKEKA | By Nabil Ibtihal
        </p>
    </div>
</footer>

<script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Pesanan Berhasil!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#198754',
        confirmButtonText: 'OK'
    });
});
</script>
@endif
</body>
</html>