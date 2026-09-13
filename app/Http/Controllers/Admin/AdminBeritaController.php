<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $query = Berita::latest('tanggal_publikasi');

        if ($cari) {
            $query->where('judul', 'like', "%{$cari}%")
                  ->orWhere('kategori', 'like', "%{$cari}%");
        }

        $beritaList = $query->paginate(10)->withQueryString();

        return view('admin.berita.index', compact('beritaList', 'cari'));
    }

    public function create()
    {
        return view('admin.berita.tambah');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:50'],
            'ringkasan' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'tanggal_publikasi' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'kategori.required' => 'Kategori berita wajib dipilih.',
            'ringkasan.required' => 'Ringkasan berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $slugAwal = Str::slug($validasi['judul']);
        $slug = $slugAwal;
        $counter = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $slugAwal . '-' . $counter;
            $counter++;
        }
        $validasi['slug'] = $slug;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $namaFile, 'public');
            $validasi['gambar'] = $path;
        }

        Berita::create($validasi);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.ubah', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:50'],
            'ringkasan' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'tanggal_publikasi' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'kategori.required' => 'Kategori berita wajib dipilih.',
            'ringkasan.required' => 'Ringkasan berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($validasi['judul'] !== $berita->judul) {
            $slugAwal = Str::slug($validasi['judul']);
            $slug = $slugAwal;
            $counter = 1;
            while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                $slug = $slugAwal . '-' . $counter;
                $counter++;
            }
            $validasi['slug'] = $slug;
        }

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $namaFile, 'public');
            $validasi['gambar'] = $path;
        }

        $berita->update($validasi);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil dihapus.');
    }
}
