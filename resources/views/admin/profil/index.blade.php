@extends('layouts.admin')

@section('judul', 'Profil & Statistik Sekolah')
@section('halaman_judul', 'Pengaturan Profil & Statistik Sekolah')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card card-custom p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div>
                    <h5 class="fw-extrabold mb-1 text-dark">Identitas Sekolah & Data Statistik</h5>
                    <small class="text-muted">Perubahan data di halaman ini akan langsung diperbarui di Halaman Utama dan Tabel Informasi Profil Sekolah</small>
                </div>
                <a href="{{ route('profil') }}" target="_blank" class="btn btn-outline-emerald btn-sm rounded-pill px-3">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Buka Halaman Profil
                </a>
            </div>

            <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Kelompok Statistik Sekolah (Poin 3) -->
                <div class="p-4 rounded-4 border mb-4" style="background: linear-gradient(135deg, #ecfdf5 0%, #f8fafc 100%); border-color: rgba(4, 120, 87, 0.2) !important;">
                    <h6 class="fw-bold text-success mb-3">
                        <i class="bi bi-graph-up-arrow me-2"></i> Data Statistik Sekolah (Tampil di Beranda & Profil)
                    </h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="jumlah_guru" class="form-label fw-semibold">Jumlah Guru / Tenaga Pendidik <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-success"><i class="bi bi-person-workspace"></i></span>
                                <input type="number" name="jumlah_guru" id="jumlah_guru" class="form-control @error('jumlah_guru') is-invalid @enderror" value="{{ old('jumlah_guru', $profil->jumlah_guru ?? 48) }}" required min="0">
                            </div>
                            @error('jumlah_guru')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="jumlah_siswa" class="form-label fw-semibold">Jumlah Siswa / Peserta Didik <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-primary"><i class="bi bi-people"></i></span>
                                <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control @error('jumlah_siswa') is-invalid @enderror" value="{{ old('jumlah_siswa', $profil->jumlah_siswa ?? 850) }}" required min="0">
                            </div>
                            @error('jumlah_siswa')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="jumlah_kelas" class="form-label fw-semibold">Jumlah Rombel (Kelas) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-warning"><i class="bi bi-door-open"></i></span>
                                <input type="number" name="jumlah_kelas" id="jumlah_kelas" class="form-control @error('jumlah_kelas') is-invalid @enderror" value="{{ old('jumlah_kelas', $profil->jumlah_kelas ?? 24) }}" required min="0">
                            </div>
                            @error('jumlah_kelas')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Kelompok Identitas Lembaga -->
                <h6 class="fw-bold text-dark mb-3">
                    <i class="bi bi-building me-2 text-success"></i> Informasi Pokok Sekolah
                </h6>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_sekolah" class="form-label fw-semibold">Nama Resmi Sekolah <span class="text-danger">*</span></label>
                        <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required>
                        @error('nama_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="npsn" class="form-label fw-semibold">NPSN <span class="text-danger">*</span></label>
                        <input type="text" name="npsn" id="npsn" class="form-control font-monospace @error('npsn') is-invalid @enderror" value="{{ old('npsn', $profil->npsn ?? '') }}" required>
                        @error('npsn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="akreditasi" class="form-label fw-semibold">Status Akreditasi <span class="text-danger">*</span></label>
                        <input type="text" name="akreditasi" id="akreditasi" class="form-control @error('akreditasi') is-invalid @enderror" value="{{ old('akreditasi', $profil->akreditasi ?? 'A') }}" required placeholder="Contoh: A (Unggul)">
                        @error('akreditasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_kepala_sekolah" class="form-label fw-semibold">Nama Kepala Sekolah <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kepala_sekolah" id="nama_kepala_sekolah" class="form-control @error('nama_kepala_sekolah') is-invalid @enderror" value="{{ old('nama_kepala_sekolah', $profil->nama_kepala_sekolah ?? '') }}" required>
                        @error('nama_kepala_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="telepon" class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $profil->telepon ?? '') }}">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="email" class="form-label fw-semibold">Email Sekolah</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profil->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label fw-semibold">Alamat Lengkap Sekolah <span class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sambutan_kepala_sekolah" class="form-label fw-semibold">Teks Sambutan Kepala Sekolah</label>
                    <textarea name="sambutan_kepala_sekolah" id="sambutan_kepala_sekolah" rows="4" class="form-control @error('sambutan_kepala_sekolah') is-invalid @enderror">{{ old('sambutan_kepala_sekolah', $profil->sambutan_kepala_sekolah ?? '') }}</textarea>
                    @error('sambutan_kepala_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="visi" class="form-label fw-semibold">Visi Sekolah</label>
                        <textarea name="visi" id="visi" rows="4" class="form-control @error('visi') is-invalid @enderror">{{ old('visi', $profil->visi ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="misi" class="form-label fw-semibold">Misi Sekolah</label>
                        <textarea name="misi" id="misi" rows="4" class="form-control @error('misi') is-invalid @enderror">{{ old('misi', $profil->misi ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="sejarah" class="form-label fw-semibold">Sejarah Singkat Sekolah</label>
                    <textarea name="sejarah" id="sejarah" rows="3" class="form-control @error('sejarah') is-invalid @enderror">{{ old('sejarah', $profil->sejarah ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold d-block">Foto Kepala Sekolah Saat Ini</label>
                    @if(!empty($profil->foto_kepala_sekolah))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah" class="rounded-3 shadow-sm" style="max-height: 120px;">
                        </div>
                    @endif
                    <label for="foto_kepala_sekolah" class="form-label fw-semibold">Ganti Foto Kepala Sekolah (Opsional)</label>
                    <input type="file" name="foto_kepala_sekolah" id="foto_kepala_sekolah" class="form-control @error('foto_kepala_sekolah') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal ukuran: 2MB.</small>
                    @error('foto_kepala_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-emerald px-5 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Seluruh Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
