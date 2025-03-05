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
        Schema::create('jenis', function(Blueprint $table){
            $table->id();
            $table->string('label');
            $table->string('warna');
            $table->enum('relasi', ['jalur', 'lahan', 'cabang']);
            $table->timestamps();
        });
        Schema::create('jalur', function(Blueprint $table){
            $table->id();
            $table->integer('id_jenis');
            $table->string('nama');
            $table->string('kode');
            $table->tinyText('posisi');
            $table->timestamps();
        });
        Schema::create('lahan', function(Blueprint $table){
            $table->id();
            $table->integer('id_jenis');
            $table->string('nama');
            $table->string('kode');
            $table->string('alamat')->nullable();
            $table->tinyText('posisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
        Schema::dropIfExists('jalur');
        Schema::dropIfExists('lahan');
    }
};
