<?php

namespace App\Http\Controllers;

class Konfigurasi extends Controller
{
    public function index()
    {
        $data['title'] = 'Konfigurasi';

        return view('konfigurasi', $data);
    }
}
