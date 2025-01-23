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
            ->orderByDesc('tanggal')
            ->paginate(8);
    }
    public static function get_all_konten_by_kategori($kategori){
        return DB::table('berita', 'b')
            ->selectRaw("b.id, b.judul, b.keterangan, b.slug, b.gambar, b.tanggal, k.nama as kategori, u.nama as user")
            ->join(DB::raw('kategori k'), 'b.id_kategori', '=', 'k.id')
            ->join(DB::raw('users u'), 'b.id_user', '=', 'u.id')
            ->where('k.nama', $kategori)
            ->orderByDesc('tanggal')
            ->paginate(8);
    }
    public static function get_latest_konten(){
        return DB::table('berita', 'b')
            ->selectRaw("b.judul, b.slug, b.gambar, k.nama as kategori")
            ->join(DB::raw('kategori k'), 'b.id_kategori', '=', 'k.id')
            ->join(DB::raw('users u'), 'b.id_user', '=', 'u.id')
            ->orderByDesc('tanggal')
            ->limit(5)->get();
    }
    public static function get_berita_by_slug($slug){
        return DB::table('berita', 'b')
            ->selectRaw("b.judul, b.keterangan, b.gambar, b.slug, b.tanggal, k.nama as kategori, u.nama as user")
            ->join(DB::raw('kategori k'), 'b.id_kategori', '=', 'k.id')
            ->join(DB::raw('users u'), 'b.id_user', '=', 'u.id')
            ->where('b.slug', $slug)
            ->first();
    }
    public static function search_konten($search){
        return DB::table('berita', 'b')
            ->selectRaw("b.id, b.judul, b.keterangan, b.slug, b.gambar, b.tanggal, k.nama as kategori, u.nama as user")
            ->join(DB::raw('kategori k'), 'b.id_kategori', '=', 'k.id')
            ->join(DB::raw('users u'), 'b.id_user', '=', 'u.id')
            ->where('b.judul', 'like', "%".$search."%")
            ->orderByDesc('tanggal')
            ->paginate(8);
    }
}
