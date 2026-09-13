@extends('layouts.publik')

@section('judul', 'Kabar & Berita Sekolah')

@section('konten')
    <!-- Banner Berita Eksklusif -->
    <div class="page-header-exclusive">
        <div class="container text-center py-2">
            <span class="badge badge-gold px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Pusat Informasi</span>
            <h1 class="display-5 fw-extrabold mb-2 text-white">Kabar & Berita Kegiatan Sekolah</h1>
            <p class="lead text-light opacity-90 mb-0">Warta aktual seputar kegiatan akademik, prestasi lomba kejuruan, dan agenda institusi</p>
        </div>
    </div>

    <div class="container py-5">
        <!-- Form Pencarian & Kategori Eksklusif -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white">
            <form action="{{ route('berita.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-7">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-success"><i class="bi bi-search"></i></span>
                        <input type="text" name="cari" value="{{ $cari }}" class="form-control bg-light border-start-0" placeholder="Cari judul berita atau isi kegiatan...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select bg-light">
                        <option value="Semua">Semua Kategori</option>
                        @foreach($daftarKategori as $kat)
                            <option value="{{ $kat }}" {{ $kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-emerald rounded-pill py-2">
                        Filter Warta
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Berita -->
        <div class="row g-4">
            @forelse($beritaList as $berita)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 school-card-exclusive border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="position-relative bg-light" style="height: 220px;">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3 text-center" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857;">
                                    <i class="bi bi-newspaper fs-1"></i>
                                    <span class="small fw-bold mt-1">Dokumentasi Warta</span>
                                </div>
                            @endif
                            <span class="badge position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm" style="background: #065f46; color: white;">
                                {{ $berita->kategori }}
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="text-muted small mb-2 d-flex align-items-center gap-2">
                                <i class="bi bi-calendar3 text-success"></i>
                                <span>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                            </div>

                            <h5 class="card-title fw-extrabold mb-2">
                                <a href="{{ route('berita.detail', $berita->slug) }}" class="text-dark text-decoration-none hover-emerald">
                                    {{ Str::limit($berita->judul, 65) }}
                                </a>
                            </h5>

                            <p class="text-secondary small mb-4 flex-grow-1" style="line-height: 1.7;">
                                {{ Str::limit($berita->ringkasan, 120) }}
                            </p>

                            <a href="{{ route('berita.detail', $berita->slug) }}" class="btn btn-outline-emerald btn-sm rounded-pill mt-auto fw-bold align-self-start px-3 py-1">
                                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-newspaper fs-1 d-block mb-2 text-warning"></i>
                    Tidak ada artikel atau berita yang sesuai dengan pencarian Anda.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $beritaList->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
