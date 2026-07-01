<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;


class KontrolAdmin extends Controller
{
    // LOGIN PAGE
    public function login()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function prosesLogin(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ], [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password wajib diisi.',
    ]);

    $admin = Admin::where('username', $request->username)->first();

    if (!$admin || !Hash::check($request->password, $admin->password)) {
        return back()
            ->withInput()
            ->with('error', 'Username atau password salah.');
    }

    Session::put('admin_id', $admin->id);
    Session::put('admin_nama', $admin->nama);
    Session::put('admin_foto', $admin->foto);

    return redirect()->route('admin.dashboard');
}
    // LOGOUT
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    // DASHBOARD
 public function dashboard()
{
    $totalProduk = Produk::count();

    $totalPesanan = Pesanan::count();

    $totalPendapatan = Pesanan::where('status','Selesai')
        ->sum('total_harga');

    $totalTerjual = Pesanan::where('status','Selesai')
        ->sum('jumlah');

    $diproses = Pesanan::where('status','Diproses')->count();

    $dikirim = Pesanan::where('status','Dikirim')->count();

    $selesai = Pesanan::where('status','Selesai')->count();

    $dibatalkan = Pesanan::where('status','Dibatalkan')->count();

    $totalPendapatan = Pesanan::where('status', 'Selesai')
    ->sum('total_harga');

    $pesananTerbaru = Pesanan::with('produk')
        ->latest()
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'totalProduk',
        'totalPesanan',
        'totalPendapatan',
        'totalTerjual',
        'diproses',
        'dikirim',
        'selesai',
        'dibatalkan',
        'pesananTerbaru'
    ));
}


    // INDEX ADMIN
    public function index()
    {
        if (!Session::has('admin_id')) {
            return redirect('/login');
        }

        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    // TAMBAH
    public function tambah()
    {
        return view('admin.admin.tambah');
    }

    // SIMPAN
    public function simpan(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('asset/gambar/admin'), $file);
            $data['foto'] = $file;
        }

        $data['password'] = bcrypt($request->password);

        Admin::create($data);

        return redirect('/admin')
            ->with('success', 'Admin berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->nama = $request->nama;
        $admin->username = $request->username;

        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            $file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('asset/gambar/admin'), $file);
            $admin->foto = $file;
        }

        $admin->save();

        return redirect('/admin')
            ->with('success', 'Data berhasil diupdate');
    }

public function destroy($id)
{
    $admin = Admin::findOrFail($id);

    // KOREKSI: Pastikan folder check dan unlink sama-sama mengarah ke asset/gambar/admin
    if ($admin->foto && file_exists(public_path('asset/gambar/admin/' . $admin->foto))) {
        unlink(public_path('asset/gambar/admin/' . $admin->foto));
    }

    $admin->delete();

    return redirect()->route('admin.index')
        ->with('success', 'Admin berhasil dihapus.');
}





public function cetakPdf()
{
    $produk = produk::all();
    $pdf = Pdf::loadView('admin.pdf', compact('produk'));
    $pdf->setPaper('a4', 'portrait');
    return $pdf->stream('Laporan-Data-Produk.pdf');
}





}