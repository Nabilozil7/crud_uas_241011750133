
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {

            $table->id();

            $table->string('id_alat')->unique();

            $table->string('gambar');

            $table->string('nama_alat');

            $table->string('jenis');

            $table->enum('kondisi', [
                'Baru',
                'Baru (Segel)',
                'Open Box',
                'Refurbished'
            ]);

            $table->enum('status', [
                'Tersedia',
                'Hampir Habis',
                'Pre Order',
                'Habis'
            ]);

            $table->string('lokasi');

            $table->decimal('harga', 12, 0);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
