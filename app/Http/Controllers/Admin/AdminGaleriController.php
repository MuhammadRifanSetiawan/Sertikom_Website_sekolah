<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminGaleriController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $query = Galeri::latest();

        if ($cari) {
            $query->where('judul', 'like', "%{$cari}%")
                  ->orWhere('kategori', 'like', "%{$cari}%");
        }

        $galeriList = $query->paginate(10)->withQueryString();

        return view('admin.galeri.index', compact('galeriList', 'cari'));
    }

    public function create()
    {
        return view('admin.galeri.tambah');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori' => ['required', 'string', 'max:50'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'keterangan' => ['nullable', 'string'],
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'gambar.required' => 'Berkas gambar wajib diunggah.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        $file = $request->file('gambar');
        $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('galeri', $namaFile, 'public');
        $validasi['gambar'] = $path;

        Galeri::create($validasi);

        return redirect()->route('admin.galeri.index')->with('sukses', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.ubah', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori' => ['required', 'string', 'max:50'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'keterangan' => ['nullable', 'string'],
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galeri', $namaFile, 'public');
            $validasi['gambar'] = $path;
        }

        $galeri->update($validasi);

        return redirect()->route('admin.galeri.index')->with('sukses', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('sukses', 'Galeri berhasil dihapus.');
    }
}
