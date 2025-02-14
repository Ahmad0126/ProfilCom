<?php

namespace App\Http\Controllers;

use App\Models\Cabang as CabangModel;
use Illuminate\Http\Request;

class Cabang extends Controller
{
    public function index(){
        $data['title'] = 'Daftar Cabang';
        $data['cabang'] = CabangModel::all();
        return view('admin.cabang_map', $data);
    }
    public function store(Request $req){
        $req->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama' => 'required|max:60|unique:cabang,nama',
            'alamat' => 'required',
            'fasilitas' => 'required',
        ]);

        try{
            $cabang = new CabangModel();
            $cabang->nama = $req->nama;
            $cabang->alamat = $req->alamat;
            $cabang->fasilitas = $req->fasilitas;
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
            'nama' => 'required|max:60|unique:cabang,nama',
            'alamat' => 'required',
            'fasilitas' => 'required',
            'id' => 'required',
        ]);

        try{
            $cabang = new CabangModel();
            $cabang->nama = $req->nama;
            $cabang->alamat = $req->alamat;
            $cabang->fasilitas = $req->fasilitas;
            $cabang->kode = $req->kode;
            $cabang->latitude = $req->latitude;
            $cabang->longitude = $req->longitude;
            $cabang->save();
    
            return redirect(route('cabang'))->with('alert', 'Berhasil Menambahkan Data Cabang');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
