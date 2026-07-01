<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KontrolPesanan extends Controller
{
    public function create($id)
{
    $produk = Produk::findOrFail($id);

    return view('web.order', compact('produk'));
}

    public function store(Request $request)
    {
        $request->validate([
        'nama_pemesan' => 'required',
        'email' => 'required|email',
        'no_hp' => 'required',
        'produk_id' => 'required',
        'jumlah' => 'required|integer|min:1',
        'total_harga' => 'required|numeric',
        'alamat_pengiriman' => 'required',
        'keterangan' => 'nullable',
        ]);

        pesanan::create([
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'keterangan' => $request->keterangan,
        ]);

      return redirect('/produk')->with(
    'success',
    '🎉 Pesanan berhasil dibuat. Terima kasih telah memesan di AKEKA. Pesanan Anda akan segera diproses ');  
}

    public function index()
    {
        $pesanan = pesanan::with('produk')->latest()->get();

        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = pesanan::findOrFail($id);
        $produk = Produk::all();

        return view('admin.pesanan.edit', compact('pesanan', 'produk'));
    }

    public function update(Request $request, $id)
{
    $pesanan = pesanan::findOrFail($id);

    $produk = Produk::findOrFail($request->produk_id);

    $total = $produk->harga * $request->jumlah;

    $pesanan->update([
        'nama_pemesan'      => $request->nama_pemesan,
        'email'             => $request->email,
        'no_hp'             => $request->no_hp,
        'produk_id'         => $request->produk_id,
        'jumlah'            => $request->jumlah,
        'total_harga'       => $total,
        'status'            => $request->status,
        'keterangan'        => $request->keterangan,
    ]);

    return redirect()->route('pesanan.index')
        ->with('success', 'Data pesanan berhasil diubah.');
}

    public function destroy($id)
    {
        $pesanan = pesanan::findOrFail($id);

        $pesanan->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Data pesanan berhasil dihapus.');
    }


    public function pdf()
{
    $pesanan = pesanan::with('produk')->get();

    $pdf = Pdf::loadView('admin.pdf_pesanan', compact('pesanan'))
            ->setPaper('A4', 'landscape');

    return $pdf->download('Laporan_Pesanan_AKEKA.pdf');
}
}