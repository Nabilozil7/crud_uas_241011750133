<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KontrolProduk extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required|unique:produk,id_alat',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama_alat' => 'required',
            'jenis' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric|min:0',
        ]);

        $namaGambar = time().'.'.$request->gambar->extension();

        $request->gambar->move(public_path('asset/gambar/produk'), $namaGambar);

        Produk::create([
            'id_alat' => $request->id_alat,
            'gambar' => $namaGambar,
            'nama_alat' => $request->nama_alat,
            'jenis' => $request->jenis,
            'kondisi' => $request->kondisi,
            'status' => $request->status,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'id_alat' => 'required|unique:produk,id_alat,'.$id,
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_alat' => 'required',
            'jenis' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('gambar')) {

            $namaGambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(
                public_path('asset/gambar/produk'),
                $namaGambar
            );

            $produk->gambar = $namaGambar;
        }

        $produk->id_alat = $request->id_alat;
        $produk->nama_alat = $request->nama_alat;
        $produk->jenis = $request->jenis;
        $produk->kondisi = $request->kondisi;
        $produk->status = $request->status;
        $produk->lokasi = $request->lokasi;
        $produk->harga = $request->harga;

        $produk->save();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diupdate.');
    }


    public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    // hapus gambar dari folder (opsional tapi disarankan)
    if ($produk->gambar && file_exists(public_path('asset/gambar/produk/'.$produk->gambar))) {
        unlink(public_path('asset/gambar/produk/'.$produk->gambar));
    }

    $produk->delete();

    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil dihapus.');
}



    public function cetakPdf()
    {
        $produk = Produk::all();

        $pdf = Pdf::loadView('admin.pdf_produk', compact('produk'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('Laporan_Produk_AKEKA.pdf');
    }
}