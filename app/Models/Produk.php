<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'id_alat',
        'gambar',
        'nama_alat',
        'jenis',
        'kondisi',
        'status',
        'lokasi',
        'harga',
        ];

     public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
