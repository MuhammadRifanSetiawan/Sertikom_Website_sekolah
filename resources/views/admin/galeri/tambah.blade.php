@extends('layouts.admin')

@section('judul', 'Unggah Galeri')
@section('halaman_judul', 'Unggah Foto Galeri')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Formulir Unggah Foto Dokumentasi</h5>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Foto / Dokumentasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required placeholder="Contoh: Upacara Peringatan Hari Pahlawan">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Kategori Kegiatan <span class="text-danger">*</span></label>
                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                        <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="Kesenian" {{ old('kategori') == 'Kesenian' ? 'selected' : '' }}>Kesenian</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Berkas Foto Multimedia <span class="text-danger">*</span></label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" required>
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal ukuran: 3MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="form-label fw-semibold">Keterangan / Deskripsi Foto</label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan singkat mengenai foto ini...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light px-4">Batal</a>
                    <button type="submit" class="btn btn-emerald px-4 rounded-pill shadow-sm">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Unggah Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
