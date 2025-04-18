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
        Schema::create('stok-produk', function (Blueprint $table) {
            $table->uuid('produk_id')->primary();
            $table->uuid('karyawan_id')->nullable();
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan')->onDelete('cascade');
            $table->uuid('admin_id')->nullable();
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->integer('stok');
            $table->string('harga');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok-produk');
    }
};
