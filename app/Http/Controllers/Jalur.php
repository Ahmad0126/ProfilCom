<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jalur as JalurModel;

class Jalur extends Controller
{
    public function index(){
        $data['title'] = 'Daftar Jalur';
        $data['jalur'] = JalurModel::get_jalur();
        return view('admin.jalur_map', $data);
    }
    public function tambah(){
        $data['title'] = 'Tambah Jalur';
        $data['jalur'] = new JalurModel();
        $data['jenis'] = Jenis::where('relasi', 'jalur')->get();
        return view('admin.jalur_form', $data);
    }
    public function edit($id){
        $jalur = JalurModel::find($id);
        if($jalur == null){
            abort(404);
        }

        $data['title'] = 'Edit Jalur';
        $data['jalur'] = $jalur;
        $data['jenis'] = Jenis::where('relasi', 'jalur')->get();
        return view('admin.jalur_form', $data);
    }
    public function hapus($id){
        try{
            $jalur = JalurModel::find($id);
            if($jalur == null){
                abort(404);
            }

            JalurModel::destroy($id);
            return redirect(route('jalur'))->with('alert', 'Berhasil Menghapus Data Jalur');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function store(Request $req){
        $req->validate([
            'posisi' => 'required',
            'nama' => 'required|max:60',
            'kode' => 'nullable|unique:jalur,kode',
            'id_jenis' => 'required|exists:jenis,id',
        ]);

        try{
            $jalur = new JalurModel();
            $jalur->nama = $req->nama;
            $jalur->id_jenis = $req->id_jenis;
            $jalur->kode = $req->kode;
            $jalur->posisi = $req->posisi;
            $jalur->save();
    
            return redirect(route('jalur'))->with('alert', 'Berhasil Menambahkan Data Jalur');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function update(Request $req){
        $req->validate([
            'posisi' => 'required',
            'nama' => 'required|max:60',
            'id_jenis' => 'required|exists:jenis,id',
            'kode' => 'nullable|unique:jalur,kode,'.$req->id.',id',
            'id' => 'required',
        ]);

        try{
            $jalur = JalurModel::find($req->id);
            $jalur->nama = $req->nama;
            $jalur->id_jenis = $req->id_jenis;
            $jalur->kode = $req->kode ?? $jalur->kode;
            $jalur->posisi = $req->posisi;
            $jalur->save();
    
            return redirect(route('jalur'))->with('alert', 'Berhasil Mengedit Data Jalur');
        }catch(\Throwable $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function info(Request $req){
        $res = JalurModel::get_jalur(true);
        foreach ($res as $key => $value) {
            $value->created_at = date('d M Y', strtotime($value->created_at));
            $value->updated_at = date('d M Y', strtotime($value->updated_at));

            $res[$key] = $value;
        }
        return response()->json($res);
    }
}
