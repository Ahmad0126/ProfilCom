<?php

namespace App\Http\Controllers;

use App\Models\Kategori as KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    public function index(){
        $data['kategori'] = KategoriModel::all();
        $data['title'] = 'Daftar Kategori';
        return view('kategori', $data);
    }
    public function store(Request $req):RedirectResponse {
        $req->validate([
            'nama' => 'required|max:255',
        ]);

        try {
            $kategori = new KategoriModel();
            $kategori->nama = $req->nama;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil menambahkan kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function edit(Request $req):RedirectResponse {
        $req->validate([
            'id' => 'required|exists:kategori,id',
            'nama' => 'required|unique:kategori,nama,'.$req->id.',id|max:255',
        ]);

        try {
            $kategori = KategoriModel::find($req->id);
            $kategori->nama = $req->nama;
            $kategori->save();
    
            return redirect(route('kategori'))->with('alert', 'Berhasil mengedit kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
    public function hapus($id = null){
        $kategori = KategoriModel::find($id);
        abort_if($kategori == null, 404);

        try {
            KategoriModel::destroy($id);
            return redirect(route('kategori'))->with('alert', 'Berhasil menghapus kategori');
        } catch (\Throwable $th) {
            return redirect(route('kategori'))->withErrors($th->getMessage());
        }
    }
}
