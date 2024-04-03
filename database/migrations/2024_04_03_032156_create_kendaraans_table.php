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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('code_kendaraan',20);
            $table->string('merk_kendaraan',150);
            $table->string('model_kendaraan',200);
            $table->string('plat_kendaraan',12)->unique();
            $table->bigInteger('nominal_denda');
            $table->enum('status_kendaraan', ['tersedia', 'disewakan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
