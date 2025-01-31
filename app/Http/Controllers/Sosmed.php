<?php

namespace App\Http\Controllers;

use App\Models\Sosmed as SosmedModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Sosmed extends Controller
{
    public function index(){
        $data['sosmed'] = SosmedModel::all();
        $data['title'] = 'Daftar Sosmed';
        return view('link_sosmed', $data);
    }
    public function store(Request $req):RedirectResponse {
        $req->validate([
            'nama_sosmed' => 'required|max:255|unique:link_sosmed,nama_sosmed',
            'url' => 'required|max:255',
        ]);

        try {
            $gambar = $req->file('logo');
            if($gambar == null){
                return redirect()->back()->withErrors('Sertakan Icon Sosmed!');
            }
            if($gambar->getSize() > (1024*1024)){
                return redirect()->back()->withErrors('Ukuran Icon melebihi 1MB');
            }

            $path = $gambar->store('upload/sosmed');

            $sosmed = new SosmedModel();
            $sosmed->nama_sosmed = $req->nama_sosmed;
            $sosmed->url = $req->url;
            $sosmed->logo = $path;
            $sosmed->save();

            return redirect(route('sosmed'))->with('alert', 'Berhasil menambahkan sosmed');
        } catch (\Throwable $th) {
            return redirect(route('sosmed'))->withErrors($th->getMessage());
        }
    }
    public function edit(Request $req):RedirectResponse {
        $req->validate([
            'id' => 'required|exists:link_sosmed,id',
            'nama_sosmed' => 'required|unique:link_sosmed,nama_sosmed,'.$req->id.',id|max:255',
            'url' => 'required|max:255',
        ]);

        try {
            $sosmed = SosmedModel::find($req->id);
            $sosmed->nama_sosmed = $req->nama_sosmed;
            $sosmed->url = $req->url;

            $gambar = $req->file('logo');
            if($gambar != null){
                if($gambar->getSize() > (1024*1024)){
                    return redirect()->back()->withErrors('Ukuran Icon melebihi 1MB');
                }

                Storage::delete($sosmed->logo);
                $sosmed->logo = $gambar->store('upload/sosmed');
            }
            
            $sosmed->save();
    
            return redirect(route('sosmed'))->with('alert', 'Berhasil mengedit sosmed');
        } catch (\Throwable $th) {
            return redirect(route('sosmed'))->withErrors($th->getMessage());
        }
    }
    public function hapus($id = null){
        $sosmed = SosmedModel::find($id);
        abort_if($sosmed == null, 404);

        try {
            if($sosmed->logo){
                Storage::delete($sosmed->logo);
            }
            SosmedModel::destroy($id);
            return redirect(route('sosmed'))->with('alert', 'Berhasil menghapus sosmed');
        } catch (\Throwable $th) {
            return redirect(route('sosmed'))->withErrors($th->getMessage());
        }
    }
}
