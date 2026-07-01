<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Laporan Pesanan</title>

<style>

body{
    font-family:Arial;
    font-size:12px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid black;
}

th{
    background:#198754;
    color:white;
}

th,td{
    padding:8px;
    text-align:center;
}

.kop{
    text-align:center;
    margin-bottom:20px;
}

hr{
    border:2px solid black;
}

</style>

</head>

<body>

<div class="kop">

<h2>LAPORAN AKEKA</h2>

<h4>Data Pesanan</h4>

<p>Sistem Penjualan Alat Kebersihan</p>

</div>

<hr>

<table>

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

@foreach($pesanan as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama_pemesan }}</td>

<td>{{ $item->produk->nama_alat }}</td>

<td>{{ $item->jumlah }}</td>

<td>
Rp {{ number_format($item->total_harga,0,',','.') }}
</td>

<td>{{ $item->status }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>
</html>