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
        Schema::create('peminjaman_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('code_peminjamaan',20);

            $table->foreignId('code_kendaraan')->nullable()->index();
            $table->foreignId('code_pengguna')->nullable()->index();

            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->integer('waktu_sewa');
            $table->enum('status_peminjamaan', ['berlansung', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_kendaraans');
    }
};
