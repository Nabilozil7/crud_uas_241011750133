<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - AKEKA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: #f4f6f9;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #198754, #157347);
            padding-top: 20px;
            color: white;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #e9f5ee;
            text-decoration: none;
            transition: 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
            border-left: 3px solid #ffffff;
            padding-left: 25px;
        }

        /* TOPBAR */
        .topbar {
            margin-left: 240px;
            height: 60px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .topbar .title {
            font-weight: 600;
            color: #333;
        }

        .topbar .user {
            font-weight: 500;
            color: #198754;
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 25px;
        }

        /* ACTIVE MENU (optional nanti bisa dipakai) */
        .sidebar a.active {
            background: rgba(255,255,255,0.15);
            border-left: 3px solid #fff;
        }

    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="text-center mb-4">

        <img src="{{ asset('asset/gambar/logo/akk.png') }}"
             alt="Logo AKEKA"
             style="width:70px;height:70px;object-fit:contain;border-radius:10px;background:white;padding:5px;">

        <h4 class="mt-2 mb-0">AKEKA</h4>

    </div>

    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('produk.index') }}">Produk</a>
    <a href="{{ route('pesanan.index') }}">Pesanan</a>
    <a href="{{ route('admin.index') }}">Admin</a>

    <a href="{{ route('logout') }}" style="margin-top:20px; color:#ffdddd;">
        Logout
    </a>
</div>

<!-- TOPBAR -->
<div class="topbar d-flex justify-content-between align-items-center">

    <!-- KIRI -->
    <div class="title fw-bold text-success">
        @yield('title')
    </div>

    <!-- KANAN (USER INFO) -->
    <div class="user d-flex align-items-center gap-2">
           @if(session('admin_foto'))
                <img
                    src="{{ asset('asset/gambar/admin/'.session('admin_foto')) }}"
                    width="35"
                    height="35"
                    class="rounded-circle"
                    style="object-fit: cover;"
                >
            @endif



        <span>
            <b>{{ session('admin_nama') }}</b>
        </span>

    </div>

</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>