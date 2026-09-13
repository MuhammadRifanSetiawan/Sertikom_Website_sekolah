@extends('layouts.admin')

@section('judul', 'Tambah Ekstrakurikuler')
@section('halaman_judul', 'Tambah Ekstrakurikuler')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Formulir Tambah Ekstrakurikuler</h5>
                <a href="{{ route('admin.ekskul.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_ekskul" class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                    <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror" value="{{ old('nama_ekskul') }}" required placeholder="Contoh: Palang Merah Remaja (PMR)">
                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_pembina" class="form-label fw-semibold">Nama Pembina <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pembina" id="nama_pembina" class="form-control @error('nama_pembina') is-invalid @enderror" value="{{ old('nama_pembina') }}" required placeholder="Contoh: Budi Santoso, S.Pd">
                        @error('nama_pembina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jadwal" class="form-label fw-semibold">Jadwal Latihan <span class="text-danger">*</span></label>
                        <input type="text" name="jadwal" id="jadwal" class="form-control @error('jadwal') is-invalid @enderror" value="{{ old('jadwal') }}" required placeholder="Contoh: Setiap Jumat, 15.00 - 17.00 WIB">
                        @error('jadwal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Kegiatan Ekskul <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required placeholder="Jelaskan tujuan dan kegiatan ekskul ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Foto Kegiatan Ekskul (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal: 2MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-light px-4">Batal</a>
                    <button type="submit" class="btn btn-emerald px-4 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Data Ekskul
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
