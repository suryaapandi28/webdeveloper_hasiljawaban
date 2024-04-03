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
        Schema::create('account', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('code_account',15);
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->enum('status_account', ['active', 'inactive']);
            $table->enum('role', ['pengguna', 'admin','super_admin']);

        });

        Schema::create('pengguna', function (Blueprint $table) {
            $table->string('code_pengguna')->primary();
            $table->foreignId('code_account')->nullable()->index();
            $table->string('nama',50);
            $table->longText('alamat');
            $table->bigInteger('no_hp');
            $table->bigInteger('no_sim');


        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('sessions');
    }
};
