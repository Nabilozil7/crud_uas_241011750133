<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Laporan Produk AKEKA</title>

<style>

body{
    font-family:Arial,sans-serif;
    font-size:12px;
    margin:20px;
    color:#333;
}

.kop{
    border-bottom:2px solid #198754;
    padding-bottom:10px;
    margin-bottom:20px;
}

.logo{
    width:200px;
    float:left;
}

.judul{
    text-align:center;
    font-size:32px;
    font-weight:bold;
    color:#198754;
}

.judul h2{
    margin:0;
    color:#151515;
    font-size:22px;
}

.judul h4{
    margin:3px 0;
    font-size:15px;
}

.judul p{
    margin:2px 0;
    font-size:11px;
}

.clear{
    clear:both;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#198754;
    color:#fff;
    padding:8px;
    border:1px solid #ddd;
}

td{
    border:1px solid #ddd;
    padding:7px;
    text-align:center;
    vertical-align:middle;
}

.img{
    width:60px;
    height:60px;
    object-fit:cover;
}

.footer{
    position:fixed;
    bottom:0;
    width:100%;
    text-align:center;
    font-size:10px;
    color:#777;
}

</style>

</head>

<body>

<!-- HEADER -->

<div class="kop">

<img src="{{ public_path('asset/gambar/logo/akk.png') }}"
class="logo">

        <div class="judul">
            <div class="judul">LAPORAN DATA PRODUK</div>
            <div class="judul">AKEKA</div>
             <div class="judul h2">
                 Sistem Pengadaan Alat Kebersihan Kantor
            </div>
        </div>

<div class="clear"></div>

</div>

<p style="text-align:right;">
Tanggal Cetak :
{{ date('d F Y') }}
</p>

<table>

<thead>

<tr>

<th>No</th>
<th>Gambar</th>
<th>ID</th>
<th>Nama Produk</th>
<th>Jenis</th>
<th>Kondisi</th>
<th>Status</th>
<th>Lokasi</th>
<th>Harga</th>

</tr>

</thead>

<tbody>

@foreach($produk as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

@php

$path = public_path('asset/gambar/produk/'.$item->gambar);

$base64 = null;

if($item->gambar && file_exists($path))
{
    $type = pathinfo($path, PATHINFO_EXTENSION);

    $data = file_get_contents($path);

    $base64 = 'data:image/'.$type.';base64,'.base64_encode($data);
}

@endphp

@if($base64)

<img src="{{ $base64 }}" class="img">

@else

Tidak Ada

@endif

</td>

<td>{{ $item->id_alat }}</td>

<td>{{ $item->nama_alat }}</td>

<td>{{ $item->jenis }}</td>

<td>{{ $item->kondisi }}</td>

<td>{{ $item->status }}</td>

<td>{{ $item->lokasi }}</td>

<td>
Rp {{ number_format($item->harga,0,',','.') }}
</td>

</tr>

@endforeach

</tbody>

</table>

<div class="footer">

© {{ date('Y') }} AKEKA - Sistem Pengadaan Alat Kebersihan Kantor

</div>

</body>
</html>