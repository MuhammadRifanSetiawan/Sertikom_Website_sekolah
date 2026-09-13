<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $query = Galeri::latest();

        if ($kategori && $kategori !== 'Semua') {
            $query->where('kategori', $kategori);
        }

        $galeriList = $query->paginate(9)->withQueryString();
        $daftarKategori = Galeri::select('kategori')->distinct()->pluck('kategori');

        return view('publik.galeri', compact('galeriList', 'daftarKategori', 'kategori'));
    }
}
