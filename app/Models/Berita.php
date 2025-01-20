<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    public static function get_all_konten(){
        return DB::table('berita', 'b')
            ->selectRaw("b.id, b.judul, b.keterangan, b.slug, b.gambar, b.tanggal, k.nama as kategori, u.nama as user")
            ->join(DB::raw('kategori k'), 'b.id_kategori', '=', 'k.id')
            ->join(DB::raw('users u'), 'b.id_user', '=', 'u.id')
            ->get();
    }
}
