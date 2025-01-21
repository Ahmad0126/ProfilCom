<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $data['title'] = 'nama_app';
        $data['kategori'] = Kategori::all();
        return view('welcome', $data);
    }
    public function berita(){
        $data['title'] = 'Berita | nama_app';
        $data['kategori'] = Kategori::all();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['berita'] = Berita::get_all_konten();
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_active'] = null;
        return view('berita', $data);
    }
    public function kategori($nama = null){
        $data['berita'] = Berita::get_all_konten_by_kategori($nama);
        abort_if($data['berita']->isEmpty(), 404);

        $data['title'] = 'Berita '.$nama.' | nama_app';
        $data['kategori'] = Kategori::all();
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $nama;
        return view('berita', $data);
    }
    public function profile(){
        $data['title'] = 'Profil | nama_app';
        $data['kategori'] = Kategori::all();
        return view('profile', $data);
    }
    public function detail($slug){
        $data['berita'] = Berita::get_berita_by_slug($slug);
        abort_if($data['berita'] == null, 404);

        $data['title'] = $data['berita']->judul.' | nama_app';
        $data['kategori'] = Kategori::all();
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $data['berita']->kategori;
        return view('detail_berita', $data);
    }
}
