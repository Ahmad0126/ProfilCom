<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jalur extends Model
{
    use HasFactory;
    protected $table = 'jalur';

    public static function get_jalur(){
        $data = DB::table('jalur')->select(['jalur.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna'])
            ->join('jenis', 'jenis.id', '=', 'jalur.id_jenis', 'left')
            ->get();

        return $data;
    }
    public static function get_info_by_id($id){
        $data = DB::table('jalur')->select(['jalur.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna', 'jalur.created_at', 'jalur.updated_at'])
            ->where('jalur.id', $id)
            ->join('jenis', 'jenis.id', '=', 'jalur.id_jenis', 'left')
            ->get()->first();

        return $data;
    }
}
