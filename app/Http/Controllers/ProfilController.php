<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('publik.profil', compact('profil'));
    }
}
