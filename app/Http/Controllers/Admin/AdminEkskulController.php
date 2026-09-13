<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminEkskulController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $query = Ekstrakurikuler::latest();

        if ($cari) {
            $query->where('nama_ekskul', 'like', "%{$cari}%")
                  ->orWhere('nama_pembina', 'like', "%{$cari}%");
        }

        $ekskulList = $query->paginate(10)->withQueryString();

        return view('admin.ekskul.index', compact('ekskulList', 'cari'));
    }

    public function create()
    {
        return view('admin.ekskul.tambah');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_ekskul' => ['required', 'string', 'max:100'],
            'nama_pembina' => ['required', 'string', 'max:150'],
            'jadwal' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'nama_pembina.required' => 'Nama pembina wajib diisi.',
            'jadwal.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required' => 'Deskripsi ekskul wajib diisi.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('ekskul', $namaFile, 'public');
            $validasi['gambar'] = $path;
        }

        Ekstrakurikuler::create($validasi);

        return redirect()->route('admin.ekskul.index')->with('sukses', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekskul.ubah', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        $validasi = $request->validate([
            'nama_ekskul' => ['required', 'string', 'max:100'],
            'nama_pembina' => ['required', 'string', 'max:150'],
            'jadwal' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'nama_pembina.required' => 'Nama pembina wajib diisi.',
            'jadwal.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required' => 'Deskripsi ekskul wajib diisi.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
                Storage::disk('public')->delete($ekskul->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('ekskul', $namaFile, 'public');
            $validasi['gambar'] = $path;
        }

        $ekskul->update($validasi);

        return redirect()->route('admin.ekskul.index')->with('sukses', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
            Storage::disk('public')->delete($ekskul->gambar);
        }

        $ekskul->delete();

        return redirect()->route('admin.ekskul.index')->with('sukses', 'Ekstrakurikuler berhasil dihapus.');
    }
}
