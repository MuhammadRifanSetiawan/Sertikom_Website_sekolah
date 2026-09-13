<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\ProfilSekolah;

class BerandaController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $beritaTerbaru = Berita::latest('tanggal_publikasi')->take(3)->get();
        $galeriTerbaru = Galeri::latest()->take(6)->get();
        $ekskulList = Ekstrakurikuler::take(4)->get();

        return view('publik.beranda', compact('profil', 'beritaTerbaru', 'galeriTerbaru', 'ekskulList'));
    }
}
