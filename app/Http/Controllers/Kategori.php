<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kategori as KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    public function index(){
        $data['kategori'] = KategoriModel::all();
        $data['cabang'] = Jenis::where('relasi', 'cabang')->get();
        $data['lahan'] = Jenis::where('relasi', 'lahan')->get();
        $data['jalur'] = Jenis::where('relasi', 'jalur')->get();
        $data['title'] = 'Daftar Kategori';
        return view('admin.kategori', $data);
    }
    public function store(Request $req):RedirectResponse {
        $req->validate([
            'label' => 'required|max:255|unique:kategori,nama',
        ]);

        try {
            $kategori = new KategoriModel();
            $kategori->nama = $req->label;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil menambahkan kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function edit(Request $req):RedirectResponse {
        $req->validate([
            'id' => 'required|exists:kategori,id',
            'label' => 'required|unique:kategori,nama,'.$req->id.',id|max:255',
        ]);

        try {
            $kategori = KategoriModel::find($req->id);
            $kategori->nama = $req->label;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil mengedit kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function tambah_jenis(Request $req, $relasi):RedirectResponse {
        $req->validate([
            'label' => 'required',
            'warna' => 'required',
        ]);

        if(!in_array($relasi, ['jalur', 'cabang', 'lahan'])){
            abort(404);
        }

        try {
            $kategori = new Jenis();
            $kategori->label = $req->label;
            $kategori->warna = $req->warna;
            $kategori->relasi = $relasi;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil menambahkan jenis '.$relasi);
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function edit_jenis(Request $req, $relasi):RedirectResponse {
        $req->validate([
            'id' => 'required|exists:jenis,id',
            'label' => 'required',
            'warna' => 'required',
        ]);

        if(!in_array($relasi, ['jalur', 'cabang', 'lahan'])){
            abort(404);
        }

        try {
            $kategori = Jenis::find($req->id);
            $kategori->label = $req->label;
            $kategori->warna = $req->warna;
            $kategori->relasi = $relasi;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil mengedit jenis '.$relasi);
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function hapus_jenis($relasi, $id = null){
        if(!in_array($relasi, ['jalur', 'cabang', 'lahan'])){
            abort(404);
        }

        $jenis = Jenis::where(['relasi' => $relasi, 'id' => $id])->get()->first();
        abort_if($jenis == null, 404);

        try {
            Jenis::destroy($id);
            return redirect(route('kategori'))->with('alert', 'Berhasil menghapus jenis');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function hapus($id = null){
        KategoriModel::findOrFail($id);

        try {
            KategoriModel::destroy($id);
            return redirect(route('kategori'))->with('alert', 'Berhasil menghapus kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
}
