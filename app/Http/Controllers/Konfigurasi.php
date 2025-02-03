<?php

namespace App\Http\Controllers;

use App\Models\Konfig;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class Konfigurasi extends Controller
{
    public function index()
    {
        $data['title'] = 'Konfigurasi';
        $data['konfig'] = Konfig::first() ?? new Konfig();

        return view('konfigurasi', $data);
    }

    public function update(Request $req)
    {
        $konfig = Konfig::find(1) ?? new Konfig();

        $req->validate([
            'logo' => [
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'x-icon', 'ico', 'svg'])
                    ->max(1024)
            ],
            'favicon' => [
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'x-icon', 'ico', 'svg'])
                    ->max(1024)
            ],
            'nama_website' => 'required|string|max:50',
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string|max:255',
            'gambar_visi' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'svg'])
                    ->max(2048)
            ],
            'visi_misi' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'nullable|string|max:255',
            'profil' => 'nullable|string',
            'breadcrumb' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'svg'])
                    ->max(2.5 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(2564)->maxHeight(1600))
            ],
        ]);

        if ($req->hasFile('logo')) {
            Storage::delete($konfig->logo ?? '');
            $logo = $req->file('logo')->store('upload/konfigurasi');
        }

        if ($req->hasFile('favicon')) {
            Storage::delete($konfig->favicon ?? '');
            $favicon = $req->file('favicon')->store('upload/konfigurasi');
        }

        if ($req->hasFile('gambar_visi')) {
            Storage::delete($konfig->gambar_visi ?? '');
            $gambar_visi = $req->file('gambar_visi')->store('upload/konfigurasi');
        }

        if ($req->hasFile('breadcrumb')) {
            Storage::delete($konfig->breadcrumb ?? '');
            $breadcrumb = $req->file('breadcrumb')->store('upload/konfigurasi');
        }

        $konfig->logo = $logo ?? $konfig->logo;
        $konfig->favicon = $favicon ?? $konfig->favicon;
        $konfig->nama_website = $req->nama_website;
        $konfig->judul = $req->judul;
        $konfig->subjudul = $req->subjudul;
        $konfig->gambar_visi = $gambar_visi ?? $konfig->gambar_visi;
        $konfig->visi_misi = $req->visi_misi;
        $konfig->telepon = $req->telepon;
        $konfig->email = $req->email;
        $konfig->alamat  =  $req->alamat;
        $konfig->profil = $req->profil;
        $konfig->breadcrumb = $breadcrumb ?? $konfig->breadcrumb;
        $konfig->save();

        return redirect('/konfigurasi')->with('success', 'Data berhasil diubah');
    }
}
