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
            'judul' => 'required|unique:berita,judul',
            'id_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        try{
            $gambar = $req->file('gambar');
            if($gambar == null){
                return redirect()->back()->withErrors('Sertakan Gambar sampul!')->withInput();
            }
            if($gambar->getSize() > (1024*1024)){
                return redirect()->back()->withErrors('Ukuran gambar melebihi 1MB')->withInput();
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
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
    public function change(Request $req){
        $req->validate([
            'id' => 'required|exists:berita,id',
            'judul' => 'required|unique:berita,judul,'.$req->id.',id',
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
                    return redirect()->back()->withErrors('Ukuran gambar melebihi 1MB')->withInput();
                }
                
                Storage::delete($berita->gambar);
                $berita->gambar = $gambar->store('upload/konten');
            }
            $berita->save();
            
            return redirect(route('konten'))->with('alert', 'Berhasil mengedit berita');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
    public function hapus($id = null){
        $berita = Berita::find($id);
        abort_if($berita == null, 404);

        if($berita->gambar){
            Storage::delete($berita->gambar);
        }
        Berita::destroy($id);
        return redirect()->back()->with('alert', 'Berhasil menghapus berita');
    }
}
