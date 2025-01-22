<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Konten extends Controller
{
    public function index(Request $req){
        $data['title'] = 'Daftar Berita';

        $search = $req->query('search');
        if($search){
            $data['berita'] = Berita::search_konten($search)->appends('search', $search);
        }else{
            $data['berita'] = Berita::get_all_konten();
        }
        
        return view('konten', $data);
    }
    public function tambah(){
        $data['title'] = 'Tambah Berita';
        $data['kategori'] = Kategori::all();
        $data['konten'] = new Berita();
        return view('tambah_konten', $data);
    }
    public function edit($id = null){
        $data['konten'] = Berita::find($id);
        abort_if($data['konten'] == null, 404);

        $data['title'] = 'Edit Berita';
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
            $gambar = $req->file('gambar');
            if($gambar == null){
                return redirect(route('konten'))->withErrors('Sertakan Gambar sampul!');
            }
            if($gambar->getSize() > (1024*1024)){
                return redirect(route('konten'))->withErrors('Ukuran gambar melebihi 1MB');
            }

            $path = $gambar->store('upload/konten');

            $berita = new Berita();
            $berita->judul = $req->judul;
            $berita->keterangan = $req->keterangan;
            $berita->id_kategori = $req->id_kategori;
            $berita->id_user = auth()->id();
            $berita->tanggal = date('Y-m-d');
            $berita->slug = Str::of($req->judul)->slug('-');
            $berita->gambar = $path;
            $berita->save();
            
            return redirect(route('konten'))->with('alert', 'Berhasil menambahkan berita');
        } catch (\Throwable $th) {
            return redirect(route('konten'))->withErrors($th->getMessage());
        }
    }
    public function change(Request $req){
        $req->validate([
            'id' => 'required|exists:berita,id',
            'judul' => 'required',
            'id_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        try{
            $berita = Berita::find($req->id);
            $berita->judul = $req->judul;
            $berita->keterangan = $req->keterangan;
            $berita->id_kategori = $req->id_kategori;
            $berita->slug = Str::of($req->judul)->slug('-');

            $gambar = $req->file('gambar');
            if($gambar != null){
                if($gambar->getSize() > (1024*1024)){
                    return redirect(route('konten'))->withErrors('Ukuran gambar melebihi 1MB');
                }
                
                Storage::delete($berita->gambar);
                $berita->gambar = $gambar->store('upload/konten');
            }
            $berita->save();
            
            return redirect(route('konten'))->with('alert', 'Berhasil mengedit berita');
        } catch (\Throwable $th) {
            return redirect(route('konten'))->withErrors($th->getMessage());
        }
    }
    public function hapus($id = null){
        $berita = Berita::find($id);
        abort_if($berita == null, 404);

        Storage::delete($berita->gambar);
        Berita::destroy($id);
        return redirect(route('konten'))->with('alert', 'Berhasil menghapus berita');
    }
}
