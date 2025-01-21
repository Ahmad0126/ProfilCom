<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public static function get_kategori_and_jumlah_kontennya($limit){
        return DB::table('kategori', 'k')
            ->selectRaw('k.nama, count(*) as jumlah')
            ->join(DB::raw('berita b'), 'b.id_kategori', '=', 'k.id')
            ->groupByRaw('k.nama')
            ->orderBy('jumlah', 'desc')
            ->limit($limit)->get();
    }
}
