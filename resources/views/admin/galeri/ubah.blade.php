@extends('layouts.admin')

@section('judul', 'Ubah Galeri')
@section('halaman_judul', 'Ubah Foto Galeri')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Formulir Ubah Foto Dokumentasi</h5>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Foto / Dokumentasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Kategori Kegiatan <span class="text-danger">*</span></label>
                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        @php $katSel = old('kategori', $galeri->kategori); @endphp
                        <option value="Kegiatan" {{ $katSel == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Fasilitas" {{ $katSel == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                        <option value="Akademik" {{ $katSel == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Olahraga" {{ $katSel == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="Kesenian" {{ $katSel == 'Kesenian' ? 'selected' : '' }}>Kesenian</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
                    @if(Str::startsWith($galeri->gambar, 'http') || Str::contains($galeri->gambar, 'galeri-'))
                        <div class="p-3 rounded-3 mb-2 text-muted small" style="background: #ecfdf5;">Placeholder Gambar Seeder</div>
                    @else
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="rounded-3 shadow-sm" style="max-height: 120px;">
                        </div>
                    @endif
                    <label for="gambar" class="form-label fw-semibold">Ganti Foto (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal ukuran: 3MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="form-label fw-semibold">Keterangan / Deskripsi Foto</label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light px-4">Batal</a>
                    <button type="submit" class="btn btn-emerald px-4 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Perbarui Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
