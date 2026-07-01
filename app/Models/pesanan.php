<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'nama_pemesan',
        'email',
        'no_hp',
        'produk_id',
        'jumlah',
        'total_harga',
        'alamat_pengiriman',
        'keterangan',
        'status',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}