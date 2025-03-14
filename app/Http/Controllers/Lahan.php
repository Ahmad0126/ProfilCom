<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lahan as LahanModel;

class Lahan extends Controller
{
    public function index(){
        $data['title'] = 'Daftar Lahan';
        $data['lahan'] = LahanModel::get_lahan();
        return view('admin.lahan_map', $data);
    }
    public function tambah(){
        $data['title'] = 'Tambah Lahan';
        $data['lahan'] = new LahanModel();
        $data['jenis'] = Jenis::where('relasi', 'lahan')->get();
        return view('admin.lahan_form', $data);
    }
    public function edit($id){
        $lahan = LahanModel::find($id);
        if($lahan == null){
            abort(404);
        }

        $data['title'] = 'Edit Lahan';
        $data['lahan'] = $lahan;
        $data['jenis'] = Jenis::where('relasi', 'lahan')->get();
        return view('admin.lahan_form', $data);
    }
    public function hapus($id){
        try{
            $lahan = LahanModel::find($id);
            if($lahan == null){
                abort(404);
            }

            LahanModel::destroy($id);
            return redirect(route('lahan'))->with('alert', 'Berhasil Menghapus Data Lahan');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function store(Request $req){
        $req->validate([
            'posisi' => 'required',
            'nama' => 'required|max:60',
            'kode' => 'nullable|unique:lahan,kode',
            'id_jenis' => 'required|exists:jenis,id',
        ]);

        try{
            $lahan = new LahanModel();
            $lahan->nama = $req->nama;
            $lahan->id_jenis = $req->id_jenis;
            $lahan->kode = $req->kode;
            $lahan->posisi = $req->posisi;
            $lahan->save();
    
            return redirect(route('lahan'))->with('alert', 'Berhasil Menambahkan Data Lahan');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function update(Request $req){
        $req->validate([
            'posisi' => 'required',
            'nama' => 'required|max:60',
            'id_jenis' => 'required|exists:jenis,id',
            'kode' => 'nullable|unique:lahan,kode,'.$req->id.',id',
            'id' => 'required',
        ]);

        try{
            $lahan = LahanModel::find($req->id);
            $lahan->nama = $req->nama;
            $lahan->id_jenis = $req->id_jenis;
            $lahan->kode = $req->kode ?? $lahan->kode;
            $lahan->posisi = $req->posisi;
            $lahan->save();
    
            return redirect(route('lahan'))->with('alert', 'Berhasil Mengedit Data Lahan');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function info(Request $req){
        $res = LahanModel::get_lahan(true);
        foreach ($res as $key => $value) {
            $value->created_at = date('d M Y', strtotime($value->created_at));
            $value->updated_at = date('d M Y', strtotime($value->updated_at));

            $res[$key] = $value;
        }
        return response()->json($res);
    }
}
