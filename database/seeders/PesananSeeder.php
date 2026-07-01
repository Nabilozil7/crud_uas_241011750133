<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pesanan')->insert([
            'nama_pemesan' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'no_hp' => '081234567890',
            'produk_id' => 1,
            'jumlah' => 2,
            'total_harga' => 7000000,
            'alamat_pengiriman' => 'Jl. Merdeka No. 10, Jakarta',
            'keterangan' => 'Mohon dikirim pada jam kerja.',
            'status' => 'Diproses',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}