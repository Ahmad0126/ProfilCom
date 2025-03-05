<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cabang as CabangModel;

class Cabang extends Controller
{
    public function index(){
        $data['title'] = 'Daftar Cabang';
        $data['cabang'] = CabangModel::get_cabang();
        return view('admin.cabang_map', $data);
    }
    public function tambah(){
        $data['title'] = 'Tambah Cabang';
        $data['cabang'] = new CabangModel();
        $data['fasilitas'] = Jenis::where('relasi', 'cabang')->get();
        return view('admin.map_cabang_form', $data);
    }
    public function edit($id){
        $cabang = CabangModel::find($id);
        if($cabang == null){
            abort(404);
        }

        $data['title'] = 'Edit Cabang';
        $data['cabang'] = $cabang;
        $data['fasilitas'] = Jenis::where('relasi', 'cabang')->get();
        return view('admin.map_cabang_form', $data);
    }
    public function hapus($id){
        try{
            $cabang = CabangModel::find($id);
            if($cabang == null){
                abort(404);
            }

            CabangModel::destroy($id);
            return redirect(route('cabang'))->with('alert', 'Berhasil Menghapus Data Cabang');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function store(Request $req){
        $req->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama' => 'required|max:60|unique:cabang,nama',
            'alamat' => 'required',
            'kode' => 'nullable|unique:cabang,kode',
            'id_jenis' => 'required|exists:jenis,id',
        ]);

        try{
            $cabang = new CabangModel();
            $cabang->nama = $req->nama;
            $cabang->alamat = $req->alamat;
            $cabang->id_jenis = $req->id_jenis;
            $cabang->kode = $req->kode;
            $cabang->latitude = $req->latitude;
            $cabang->longitude = $req->longitude;
            $cabang->save();
    
            return redirect(route('cabang'))->with('alert', 'Berhasil Menambahkan Data Cabang');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function update(Request $req){
        $req->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama' => 'required|max:60|unique:cabang,nama,'.$req->id.',id',
            'alamat' => 'required',
            'id_jenis' => 'required|exists:jenis,id',
            'kode' => 'nullable|unique:cabang,kode,'.$req->id.',id',
            'id' => 'required',
        ]);

        try{
            $cabang = CabangModel::find($req->id);
            $cabang->nama = $req->nama;
            $cabang->alamat = $req->alamat;
            $cabang->id_jenis = $req->id_jenis;
            $cabang->kode = $req->kode ?? $cabang->kode;
            $cabang->latitude = $req->latitude;
            $cabang->longitude = $req->longitude;
            $cabang->save();
    
            return redirect(route('cabang'))->with('alert', 'Berhasil Mengedit Data Cabang');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function info(Request $req){
        $status = 200;
        $message = 'OK';
        $payload = null;

        try{
            $cabang = CabangModel::get_info_by_coordinates($req->lat, $req->long);
            if($cabang == null){
                $message = 'Informasi tidak ditemukan';
            }
            $payload = $cabang;
        }catch(\Throwable $e){
            $status = 500;
            $message = $e->getMessage();
        }
        
        $data = [
            'status' => $status,
            'message' => $message,
            'payload' => $payload
        ];
        return response()->json($data, $status);
    }
}
