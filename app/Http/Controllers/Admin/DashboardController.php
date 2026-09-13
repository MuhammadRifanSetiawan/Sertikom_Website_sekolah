<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\ProfilSekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalEkskul = Ekstrakurikuler::count();
        $totalGaleri = Galeri::count();
        $profil = ProfilSekolah::first();
        $beritaTerbaru = Berita::latest('tanggal_publikasi')->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalEkskul', 'totalGaleri', 'profil', 'beritaTerbaru'));
    }
}
