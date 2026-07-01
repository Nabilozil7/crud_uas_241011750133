<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {

            $table->id();

            // Data Pemesan
            $table->string('nama_pemesan');
            $table->string('email');
            $table->string('no_hp');

            // Produk yang dipesan
            $table->foreignId('produk_id')
                ->constrained('produk')
                ->onDelete('cascade');

            // Jumlah pembelian
            $table->integer('jumlah');

            // Total harga
            $table->decimal('total_harga', 12, 0);

            // Alamat pengiriman
            $table->text('alamat_pengiriman');

            // Catatan pembeli
            $table->text('keterangan')->nullable();

            // Status pesanan
            $table->enum('status', [
                'Diproses',
                'Dikirim',
                'Selesai',
                'Dibatalkan'
            ])->default('Diproses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};