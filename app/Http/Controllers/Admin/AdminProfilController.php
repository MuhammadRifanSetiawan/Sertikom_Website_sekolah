<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::first();

        $validasi = $request->validate([
            'nama_sekolah' => ['required', 'string', 'max:150'],
            'npsn' => ['required', 'string', 'max:20'],
            'akreditasi' => ['required', 'string', 'max:10'],
            'nama_kepala_sekolah' => ['required', 'string', 'max:150'],
            'sambutan_kepala_sekolah' => ['nullable', 'string'],
            'alamat' => ['required', 'string'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:100'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'sejarah' => ['nullable', 'string'],
            'jumlah_guru' => ['required', 'integer', 'min:0'],
            'jumlah_siswa' => ['required', 'integer', 'min:0'],
            'jumlah_kelas' => ['required', 'integer', 'min:0'],
            'foto_kepala_sekolah' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'npsn.required' => 'NPSN wajib diisi.',
            'akreditasi.required' => 'Akreditasi wajib diisi.',
            'nama_kepala_sekolah.required' => 'Nama kepala sekolah wajib diisi.',
            'alamat.required' => 'Alamat sekolah wajib diisi.',
            'jumlah_guru.required' => 'Jumlah guru wajib diisi.',
            'jumlah_siswa.required' => 'Jumlah siswa wajib diisi.',
            'jumlah_kelas.required' => 'Jumlah kelas wajib diisi.',
        ]);

        if ($request->hasFile('foto_kepala_sekolah')) {
            if ($profil && $profil->foto_kepala_sekolah && Storage::disk('public')->exists($profil->foto_kepala_sekolah)) {
                Storage::disk('public')->delete($profil->foto_kepala_sekolah);
            }

            $file = $request->file('foto_kepala_sekolah');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profil', $namaFile, 'public');
            $validasi['foto_kepala_sekolah'] = $path;
        }

        if ($profil) {
            $profil->update($validasi);
        } else {
            ProfilSekolah::create($validasi);
        }

        return redirect()->route('admin.profil.index')->with('sukses', 'Profil dan statistik sekolah berhasil diperbarui.');
    }
}
