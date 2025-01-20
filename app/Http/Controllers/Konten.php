<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Konten extends Controller
{
    public function index(){
        $data['title'] = 'Daftar Berita';
        $data['berita'] = Berita::get_all_konten();
        return view('konten', $data);
    }
    public function tambah(){
        $data['title'] = 'Tambah Berita';
        $data['kategori'] = Kategori::all();
        return view('tambah_konten', $data);
    }

    public function store(Request $req){
        $req->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        try{
            $berita = new Berita();
            $berita->judul = $req->judul;
            $berita->keterangan = $req->keterangan;
            $berita->id_kategori = $req->id_kategori;
            $berita->id_user = auth()->id();
            $berita->tanggal = date('Y-m-d');
            $berita->slug = Str::of($req->judul)->slug('-');
            $berita->gambar = '';
            $berita->save();
            
            return redirect(route('konten'))->with('alert', 'Berhasil menambahkan berita');
        } catch (\Throwable $th) {
            return redirect(route('konten'))->withErrors($th->getMessage());
        }
    }
}
