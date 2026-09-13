<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $kategori = $request->get('kategori');

        $query = Berita::latest('tanggal_publikasi');

        if ($cari) {
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'like', "%{$cari}%")
                  ->orWhere('ringkasan', 'like', "%{$cari}%")
                  ->orWhere('isi', 'like', "%{$cari}%");
            });
        }

        if ($kategori && $kategori !== 'Semua') {
            $query->where('kategori', $kategori);
        }

        $beritaList = $query->paginate(6)->withQueryString();
        $daftarKategori = Berita::select('kategori')->distinct()->pluck('kategori');

        return view('publik.berita.index', compact('beritaList', 'daftarKategori', 'cari', 'kategori'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $beritaTerkait = Berita::where('id', '!=', $berita->id)->latest('tanggal_publikasi')->take(3)->get();

        return view('publik.berita.detail', compact('berita', 'beritaTerkait'));
    }
}
