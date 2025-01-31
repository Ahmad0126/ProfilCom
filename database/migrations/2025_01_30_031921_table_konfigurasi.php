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
        Schema::create('konfigurasi', function(Blueprint $table){
            $table->id();
            $table->string('logo');
            $table->string('favicon');
            $table->string('nama_website', 50);
            $table->string('judul');
            $table->string('subjudul');
            $table->string('gambar_visi');
            $table->text('visi_misi');
            $table->string('telepon', 20);
            $table->string('email', 100);
            $table->string('alamat');
            $table->timestamps();
        });
        Schema::create('link_sosmed', function(Blueprint $table){
            $table->id();
            $table->string('nama_sosmed', 50);
            $table->string('logo');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfigurasi');
        Schema::dropIfExists('link_sosmed');
    }
};
