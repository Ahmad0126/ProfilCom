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
            $table->string('judul_profil')->nullable();
            $table->string('subjudul_profil')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konfigurasi', function(Blueprint $table){
            $table->dropColumn('judul_profil');
            $table->dropColumn('subjudul_profil');
        });
    }
};
