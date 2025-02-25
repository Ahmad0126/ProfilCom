<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Cabang;
use App\Models\Konfig;
use App\Models\Sosmed;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Home extends Controller
{
    private $konfig;

    function __construct(){
        $this->konfig = Konfig::first() ?? new Konfig();
    }

    public function index(){
        $data['title'] = $this->konfig->nama_website;
        $data['berita'] = Berita::get_latest_konten();
        $data['konfig'] = $this->konfig;
        return view('welcome', $data);
    }
    public function login(){
        $data['title'] = 'Login  | '.$this->konfig->nama_website;
        return view('login', $data);
    }
    public function berita(Request $req){
        $data['title'] = 'Berita | '.$this->konfig->nama_website;
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

        $data['title'] = 'Berita '.$nama.' | '.$this->konfig->nama_website;
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $nama;
        return view('berita', $data);
    }
    public function profile(){
        $data['title'] = 'Profil | '.$this->konfig->nama_website;
        $data['profil'] = $this->konfig->profil;
        $data['judul'] = $this->konfig->judul_profil;
        $data['subjudul'] = $this->konfig->subjudul_profil;
        return view('profile', $data);
    }
    public function detail($slug){
        $data['berita'] = Berita::get_berita_by_slug($slug);
        abort_if($data['berita'] == null, 404);

        $data['title'] = $data['berita']->judul.' | '.$this->konfig->nama_website;
        $data['latest_berita'] = Berita::get_latest_konten();
        $data['kategori_sidebar'] = Kategori::get_kategori_and_jumlah_kontennya(5);
        $data['kategori_active'] = $data['berita']->kategori;
        return view('detail_berita', $data);
    }
    public function cabang(){
        $data['konfig'] = $this->konfig;
        $data['kategori'] = Kategori::all();
        $data['sosmed'] = Sosmed::all();
        $data['search'] = null;
        $data['cabang'] = Cabang::all();
        $data['title'] = 'Peta Cabang | '.$this->konfig->nama_website;
        return view('cabang', $data);
    }
}
