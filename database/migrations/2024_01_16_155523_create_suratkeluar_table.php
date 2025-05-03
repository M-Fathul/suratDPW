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
        Schema::create('suratkeluar', function (Blueprint $table) {
            $table->id();
            $table->string('email_user');
            $table->string('Nomor_surat');
            $table->string('penerima');
            $table->string('deskripsi');
            $table->date('tanggal_surat');
            $table->date('tanggal_terima');
            $table->enum('klasifikasi', ['Edaran', 'Perintah', 'permohonan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratkeluar');
    }
};
