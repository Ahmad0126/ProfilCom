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
        $status = 200;
        $message = 'OK';
        $payload = null;

        try{
            $lahan = LahanModel::get_info_by_id($req->id);
            if($lahan == null){
                $message = 'Informasi tidak ditemukan';
            }
            
            $lahan->created_at = date('d M Y', strtotime($lahan->created_at));
            $lahan->updated_at = date('d M Y', strtotime($lahan->updated_at));

            $payload = $lahan;
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
