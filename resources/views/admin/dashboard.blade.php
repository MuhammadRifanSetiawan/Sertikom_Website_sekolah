@extends('layouts.admin')

@section('judul', 'Dashboard Admin')
@section('halaman_judul', 'Dashboard Ringkasan')

@section('konten')
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom p-4 border-start border-4" style="border-left-color: #059669 !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Total Berita</span>
                    <h2 class="fw-extrabold mb-0 mt-1" style="color: #022c22;">{{ $totalBerita }}</h2>
                </div>
                <div class="p-3 rounded-4 shadow-sm" style="background: #ecfdf5; color: #047857;">
                    <i class="bi bi-newspaper fs-3"></i>
                </div>
            </div>
            <a href="{{ route('admin.berita.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-bold" style="color: #047857;">
                Kelola Berita <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom p-4 border-start border-4" style="border-left-color: #10b981 !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Ekstrakurikuler</span>
                    <h2 class="fw-extrabold mb-0 mt-1" style="color: #022c22;">{{ $totalEkskul }}</h2>
                </div>
                <div class="p-3 rounded-4 shadow-sm" style="background: #d1fae5; color: #065f46;">
                    <i class="bi bi-stars fs-3"></i>
                </div>
            </div>
            <a href="{{ route('admin.ekskul.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-bold" style="color: #059669;">
                Kelola Ekskul <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom p-4 border-start border-4" style="border-left-color: #d97706 !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Galeri Foto</span>
                    <h2 class="fw-extrabold mb-0 mt-1" style="color: #022c22;">{{ $totalGaleri }}</h2>
                </div>
                <div class="p-3 rounded-4 shadow-sm" style="background: #fef3c7; color: #b45309;">
                    <i class="bi bi-images fs-3"></i>
                </div>
            </div>
            <a href="{{ route('admin.galeri.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-bold" style="color: #d97706;">
                Kelola Galeri <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom p-4 border-start border-4" style="border-left-color: #0284c7 !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Siswa / Guru</span>
                    <h2 class="fw-extrabold mb-0 mt-1" style="color: #022c22;">{{ $profil->jumlah_siswa ?? 0 }} / {{ $profil->jumlah_guru ?? 0 }}</h2>
                </div>
                <div class="p-3 rounded-4 shadow-sm" style="background: #e0f2fe; color: #0369a1;">
                    <i class="bi bi-people fs-3"></i>
                </div>
            </div>
            <a href="{{ route('admin.profil.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-bold" style="color: #0284c7;">
                Ubah Profil Sekolah <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Tabel Berita Terbaru -->
    <div class="col-lg-8">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0 text-dark">Berita Kegiatan Terbaru</h5>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-emerald btn-sm rounded-pill px-3 shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Berita
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Tanggal Terbit</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritaTerbaru as $b)
                            <tr>
                                <td class="fw-bold text-dark">{{ Str::limit($b->judul, 45) }}</td>
                                <td><span class="badge" style="background: #ecfdf5; color: #047857;">{{ $b->kategori }}</span></td>
                                <td class="small text-muted">{{ \Carbon\Carbon::parse($b->tanggal_publikasi)->translatedFormat('d M Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-2" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3 text-muted">Belum ada data berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Info Singkat Sekolah -->
    <div class="col-lg-4">
        <div class="card card-custom p-4">
            <h5 class="fw-bold mb-3 text-dark pb-2 border-bottom">Identitas Resmi Sekolah</h5>
            <div class="mb-3">
                <small class="text-muted d-block fw-semibold">Nama Lembaga</small>
                <span class="fw-extrabold" style="color: #065f46;">{{ $profil->nama_sekolah ?? 'SMK Negeri 1' }}</span>
            </div>
            <div class="mb-3">
                <small class="text-muted d-block fw-semibold">NPSN & Akreditasi</small>
                <span class="badge bg-dark me-1 font-monospace">{{ $profil->npsn ?? '20104567' }}</span>
                <span class="badge badge-gold">Akreditasi {{ $profil->akreditasi ?? 'A' }}</span>
            </div>
            <div class="mb-3">
                <small class="text-muted d-block fw-semibold">Kepala Sekolah</small>
                <span class="fw-bold text-dark">{{ $profil->nama_kepala_sekolah ?? '-' }}</span>
            </div>
            <div class="mb-3">
                <small class="text-muted d-block fw-semibold">Alamat</small>
                <small class="text-secondary">{{ $profil->alamat ?? '-' }}</small>
            </div>
            <div class="mt-4 pt-3 border-top">
                <a href="{{ route('admin.profil.index') }}" class="btn btn-outline-emerald btn-sm w-100 rounded-pill py-2">
                    <i class="bi bi-gear-wide-connected me-1"></i> Edit Profil & Statistik
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
