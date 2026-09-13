@extends('layouts.admin')

@section('judul', 'Tambah Berita')
@section('halaman_judul', 'Tambah Berita Baru')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Formulir Tambah Berita Kegiatan</h5>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required placeholder="Contoh: Upacara Peringatan Hari Pendidikan Nasional">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="kategori" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                            <option value="Kerjasama" {{ old('kategori') == 'Kerjasama' ? 'selected' : '' }}>Kerjasama</option>
                            <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_publikasi" class="form-label fw-semibold">Tanggal Publikasi <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="form-control @error('tanggal_publikasi') is-invalid @enderror" value="{{ old('tanggal_publikasi', date('Y-m-d')) }}" required>
                        @error('tanggal_publikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ringkasan" class="form-label fw-semibold">Ringkasan Singkat <span class="text-danger">*</span></label>
                    <input type="text" name="ringkasan" id="ringkasan" class="form-control @error('ringkasan') is-invalid @enderror" value="{{ old('ringkasan') }}" required placeholder="Ringkasan 1-2 kalimat untuk preview di kartu berita...">
                    @error('ringkasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label fw-semibold">Isi Berita Lengkap <span class="text-danger">*</span></label>
                    <textarea name="isi" id="isi" rows="7" class="form-control @error('isi') is-invalid @enderror" required placeholder="Tuliskan berita secara terperinci di sini...">{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Unggah Foto / Gambar Berita (Multimedia)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal ukuran: 2MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-light px-4">Batal</a>
                    <button type="submit" class="btn btn-emerald px-4 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
