<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontrolHome;
use App\Http\Controllers\KontrolProduk;
use App\Http\Controllers\KontrolPesanan;
use App\Http\Controllers\KontrolAdmin;

Route::get('/', [KontrolHome::class, 'home']);
Route::get('/produk', [KontrolHome::class, 'produk']);
Route::get('/about', [KontrolHome::class, 'about']);
Route::get('/kontak', [KontrolHome::class, 'kontak']);





Route::get('/order/{id}', [KontrolPesanan::class, 'create'])->name('order');
Route::post('/order', [KontrolPesanan::class, 'store'])->name('order.store');

Route::get('/login', [KontrolAdmin::class, 'login'])->name('login');
Route::post('/login', [KontrolAdmin::class, 'prosesLogin'])->name('login.proses');
Route::get('/logout', [KontrolAdmin::class, 'logout'])->name('logout');


Route::middleware('admin')->group(function () {
Route::get('/admin/dashboard', [KontrolAdmin::class, 'dashboard'])->name('admin.dashboard');



Route::get('/admin/produk', [KontrolProduk::class, 'index'])->name('produk.index');
Route::get('/admin/produk/create', [KontrolProduk::class, 'create'])->name('produk.create');
Route::post('/admin/produk/store', [KontrolProduk::class, 'store'])->name('produk.store');
Route::get('/admin/produk/edit/{id}', [KontrolProduk::class, 'edit'])->name('produk.edit');
Route::put('/admin/produk/update/{id}', [KontrolProduk::class, 'update'])->name('produk.update');
Route::delete('/admin/produk/destroy/{id}', [KontrolProduk::class, 'destroy'])->name('produk.destroy');




Route::get('/admin/pesanan', [KontrolPesanan::class, 'index'])->name('pesanan.index');
Route::get('/admin/pesanan/edit/{id}', [KontrolPesanan::class, 'edit'])->name('pesanan.edit');
Route::put('/admin/pesanan/update/{id}', [KontrolPesanan::class, 'update'])->name('pesanan.update');
Route::delete('/admin/pesanan/hapus/{id}', [KontrolPesanan::class, 'destroy'])->name('pesanan.destroy');



Route::get('/admin', [KontrolAdmin::class, 'index'])->name('admin.index');
Route::get('/admin/tambah', [KontrolAdmin::class, 'tambah'])->name('admin.tambah');
Route::post('/admin/simpan', [KontrolAdmin::class, 'simpan'])->name('admin.simpan');
Route::get('/admin/edit/{id}', [KontrolAdmin::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [KontrolAdmin::class, 'update'])->name('admin.update');
Route::delete('/admin/hapus/{id}', [KontrolAdmin::class, 'destroy'])
    ->name('admin.destroy');

    Route::get('/admin/produk_pdf', [KontrolProduk::class, 'cetakPdf'])->name('admin.Pdf');
Route::get('/admin/pesanan_pdf', [KontrolPesanan::class, 'pdf'])->name('pesanan.pdf');

});