<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabang';

    public static function get_info_by_coordinates($lat, $long){
        DB::enableQueryLog();
        $data = DB::table('cabang')
            ->where(DB::raw('ROUND(latitude, GREATEST(14 - LENGTH(FLOOR(ABS(latitude))), 0))'), $lat)
            ->where(DB::raw('ROUND(longitude, GREATEST(14 - LENGTH(FLOOR(ABS(longitude))), 0))'), $long)
            ->get()->first();

        return $data;
    }
}
