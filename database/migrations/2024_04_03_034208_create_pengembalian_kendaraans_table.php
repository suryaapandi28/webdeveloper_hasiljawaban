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
        Schema::create('pengembalian_kendaraans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plat_kendaraan')->nullable()->index();
            $table->foreignId('code_pengguna')->nullable()->index();

            $table->integer('waktu_keterlambatan');
            $table->bigInteger('nominal_keterlambatan');
            $table->enum('status_peminjamaan', ['tepat_waktu', 'terlambat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_kendaraans');
    }
};
