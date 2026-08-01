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
        Schema::create('detail_camaba', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->string('kewarganegaraan');
            $table->string('nik')->unique();
            $table->string('nisn');
            $table->string('npwp')->nullable();
            $table->string('hp');
            $table->string('telepon_rumah')->nullable();
            $table->string('email');
            $table->string('jalan')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan');
            $table->string('kode_pos')->nullable();
            $table->string('jenis_tinggal')->nullable();
            $table->string('alat_transportasi')->nullable();
            $table->string('kebutuhan_khusus');
            $table->string('penerima_kps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_camaba');
    }
};
