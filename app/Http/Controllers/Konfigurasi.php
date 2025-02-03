<?php

namespace App\Http\Controllers;

use App\Models\Konfig;

class Konfigurasi extends Controller
{
    public function index()
    {
        $data['title'] = 'Konfigurasi';
        $data['konfig'] = Konfig::first();

        return view('konfigurasi', $data);
    }
}
