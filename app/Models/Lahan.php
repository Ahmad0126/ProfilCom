<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lahan extends Model
{
    use HasFactory;
    protected $table = 'lahan';

    public static function get_lahan($api = false){
        $data = DB::table('lahan')->select(['lahan.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna', 'lahan.created_at', 'lahan.updated_at'])
            ->join('jenis', 'jenis.id', '=', 'lahan.id_jenis', 'left');

        if($api){
            return $data->get();
        }else{
            return $data->paginate(25);
        }
    }
    public static function get_info_by_id($id){
        $data = DB::table('lahan')->select(['lahan.id', 'nama', 'kode', 'posisi', DB::raw('jenis.label as jenis'), 'warna', 'lahan.created_at', 'lahan.updated_at'])
            ->where('lahan.id', $id)
            ->join('jenis', 'jenis.id', '=', 'lahan.id_jenis', 'left')
            ->get()->first();

        return $data;
    }
}
