@extends('layouts.admin')

@section('judul', 'Ubah Ekstrakurikuler')
@section('halaman_judul', 'Ubah Data Ekstrakurikuler')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Formulir Ubah Ekstrakurikuler</h5>
                <a href="{{ route('admin.ekskul.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_ekskul" class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                    <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror" value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}" required>
                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_pembina" class="form-label fw-semibold">Nama Pembina <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pembina" id="nama_pembina" class="form-control @error('nama_pembina') is-invalid @enderror" value="{{ old('nama_pembina', $ekskul->nama_pembina) }}" required>
                        @error('nama_pembina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jadwal" class="form-label fw-semibold">Jadwal Latihan <span class="text-danger">*</span></label>
                        <input type="text" name="jadwal" id="jadwal" class="form-control @error('jadwal') is-invalid @enderror" value="{{ old('jadwal', $ekskul->jadwal) }}" required>
                        @error('jadwal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Kegiatan Ekskul <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold d-block">Foto Kegiatan Saat Ini</label>
                    @if($ekskul->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="{{ $ekskul->nama_ekskul }}" class="rounded-3 shadow-sm" style="max-height: 120px;">
                        </div>
                    @else
                        <div class="text-muted small mb-2 fst-italic">Belum ada foto yang diunggah.</div>
                    @endif
                    <label for="gambar" class="form-label fw-semibold">Ganti Foto (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal: 2MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-light px-4">Batal</a>
                    <button type="submit" class="btn btn-emerald px-4 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Perbarui Ekskul
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
