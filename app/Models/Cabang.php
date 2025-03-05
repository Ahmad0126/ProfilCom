<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabang';

    public function fasilitas():BelongsTo{
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }

    public static function get_info_by_coordinates($lat, $long){
        $data = DB::table('cabang')->select(['nama', 'alamat', 'kode', 'latitude', 'longitude', DB::raw('jenis.label as fasilitas')])
            ->where(DB::raw('ROUND(latitude, GREATEST(14 - LENGTH(FLOOR(ABS(latitude))), 0))'), $lat)
            ->where(DB::raw('ROUND(longitude, GREATEST(14 - LENGTH(FLOOR(ABS(longitude))), 0))'), $long)
            ->join('jenis', 'jenis.id', '=', 'cabang.id_jenis', 'left')
            ->get()->first();

        return $data;
    }
    public static function get_cabang(){
        $data = DB::table('cabang')->select(['cabang.id', 'nama', 'alamat', 'kode', 'latitude', 'longitude', DB::raw('jenis.label as fasilitas'), 'warna'])
            ->join('jenis', 'jenis.id', '=', 'cabang.id_jenis', 'left')
            ->get();

        return $data;
    }
}
