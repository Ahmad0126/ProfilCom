<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $data['title'] = 'nama_app';
        $data['berita'] = Berita::get_latest_konten();
        return view('welcome', $data);
    }
    public function berita(Request $req){
        $data['title'] = 'Berita | nama_app';
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);

        $search = $req->query('search');
        if($search){
            $data['berita'] = Berita::search_konten($search)->appends('search', $search);
        }else{
            $data['berita'] = Berita::get_all_konten();
        }

        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_active'] = null;
        $data['search'] = $search;
        return view('berita', $data);
    }
    public function kategori($nama = null){
        $data['berita'] = Berita::get_all_konten_by_kategori($nama);
        abort_if($data['berita']->isEmpty(), 404);

        $data['title'] = 'Berita '.$nama.' | nama_app';
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $nama;
        return view('berita', $data);
    }
    public function profile(){
        $data['title'] = 'Profil | nama_app';
        return view('profile', $data);
    }
    public function detail($slug){
        $data['berita'] = Berita::get_berita_by_slug($slug);
        abort_if($data['berita'] == null, 404);

        $data['title'] = $data['berita']->judul.' | nama_app';
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $data['berita']->kategori;
        return view('detail_berita', $data);
    }
}
