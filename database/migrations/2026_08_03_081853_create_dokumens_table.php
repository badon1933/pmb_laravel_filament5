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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('pendaftaran_id')->constrained('pendaftaran')->cascadeOnDelete();
            $table->string('ijazah');
            $table->string('transkrip_nilai');
            $table->string('ktp');
            $table->string('kk');
            $table->string('akta_lahir');
            $table->string('dokumen_lainnya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
