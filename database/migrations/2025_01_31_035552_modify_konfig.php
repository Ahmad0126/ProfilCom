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
        Schema::table('konfigurasi', function(Blueprint $table){
            $table->string('gambar_visi')->nullable()->change();
            $table->text('visi_misi')->nullable()->change();
            $table->string('telepon', 20)->nullable()->change();
            $table->string('email', 100)->nullable()->change();
            $table->string('alamat')->nullable()->change();
            $table->text('profil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konfigurasi', function(Blueprint $table){
            $table->string('gambar_visi')->nullable(false)->change();
            $table->text('visi_misi')->nullable(false)->change();
            $table->string('telepon', 20)->nullable(false)->change();
            $table->string('email', 100)->nullable(false)->change();
            $table->string('alamat')->nullable(false)->change();
            $table->dropColumn('profil');
        });
    }
};
