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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('email_user');
            $table->string('Nomor_surat');
            $table->string('pengirim');
            $table->string('deskripsi');
            $table->date('tanggal_surat');
            $table->date('tanggal_terima');
            $table->enum('klasifikasi', ['Edaran', 'Perintah', 'permohonan']);
            $table->enum('Status', ['Penting', 'Rahasia', 'Biasa'])->nullable();
            $table->string('disposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuk');
    }
};
