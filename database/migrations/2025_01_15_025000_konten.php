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
        Schema::create('kategori', function(Blueprint $table){
            $table->id();
            $table->string('nama', 60);
            $table->timestamps();
        });
        Schema::create('berita', function(Blueprint $table){
            $table->id();
            $table->integer('id_kategori');
            $table->integer('id_user');
            $table->string('judul');
            $table->text('keterangan');
            $table->string('slug');
            $table->string('gambar');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('berita');
    }
};
