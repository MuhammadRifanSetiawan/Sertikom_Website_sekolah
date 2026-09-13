<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskulList = Ekstrakurikuler::latest()->get();
        return view('publik.ekskul', compact('ekskulList'));
    }
}
