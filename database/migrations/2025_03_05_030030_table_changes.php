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
        Schema::table('cabang', function(Blueprint $table){
            $table->integer('id_jenis');
            $table->dropColumn('fasilitas');
        });
        Schema::table('jalur', function(Blueprint $table){
            $table->text('posisi')->change();
        });
        Schema::table('lahan', function(Blueprint $table){
            $table->text('posisi')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cabang', function(Blueprint $table){
            $table->dropColumn('id_jenis');
            $table->string('fasilitas');
        });
        Schema::table('jalur', function(Blueprint $table){
            $table->tinyText('posisi')->change();
        });
        Schema::table('lahan', function(Blueprint $table){
            $table->tinyText('posisi')->change();
        });
    }
};
