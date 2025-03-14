<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jalur extends Model
{
    use HasFactory;
    protected $table = 'jalur';

    public static function get_jalur($api = false){
        $data = DB::table('jalur')->select(['jalur.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna','jalur.created_at', 'jalur.updated_at'])
            ->join('jenis', 'jenis.id', '=', 'jalur.id_jenis', 'left');

        if($api){
            return $data->get();
        }else{
            return $data->paginate(25);
        }
    }
    public static function get_info_by_id($id){
        $data = DB::table('jalur')->select(['jalur.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna', 'jalur.created_at', 'jalur.updated_at'])
            ->where('jalur.id', $id)
            ->join('jenis', 'jenis.id', '=', 'jalur.id_jenis', 'left')
            ->get()->first();

        return $data;
    }
}
