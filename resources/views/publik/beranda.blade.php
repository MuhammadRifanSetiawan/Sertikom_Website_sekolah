@extends('layouts.publik')

@section('judul', 'Beranda')

@section('konten')
    <!-- Hero Section Eksklusif -->
    <section class="hero-section-exclusive">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="badge badge-gold px-3 py-2 rounded-pill mb-3 text-uppercase fw-bold" style="letter-spacing: 0.08em; font-size: 0.8rem;">
                        <i class="bi bi-patch-check-fill me-1"></i> Terakreditasi {{ $profil->akreditasi ?? 'A' }} • SMK Pusat Keunggulan
                    </span>
                    <h1 class="display-4 fw-extrabold mb-3 text-white lh-tight" style="letter-spacing: -0.02em;">
                        Membangun Generasi Vokasi <span style="background: linear-gradient(120deg, #34d399, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Kompeten, Inovatif</span> & Berintegritas
                    </h1>
                    <p class="lead text-light opacity-90 mb-4 mx-auto mx-lg-0" style="max-width: 620px; font-weight: 400; line-height: 1.8;">
                        Selamat datang di portal resmi <strong>{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Indonesia Merdeka' }}</strong>. Wadah pendidikan vokasi terdepan dengan kurikulum sinkronisasi industri 4.0.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 pt-2">
                        <a href="{{ route('profil') }}" class="btn btn-emerald btn-lg px-4 py-3 rounded-pill shadow">
                            <i class="bi bi-info-circle me-2"></i> Profil & Identitas Sekolah
                        </a>
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill fw-semibold">
                            <i class="bi bi-newspaper me-2"></i> Warta Kegiatan
                        </a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white text-dark">
                        <div class="p-4 text-white text-center" style="background: linear-gradient(135deg, #064e3b 0%, #022c22 100%);">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center p-3 mb-2 shadow-sm" style="width: 58px; height: 58px; background: rgba(245, 158, 11, 0.15); color: #f59e0b;">
                                <i class="bi bi-award-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold mb-1 text-white">Standar Pendidikan Mutu Tinggi</h5>
                            <small class="text-warning fw-semibold">NPSN: {{ $profil->npsn ?? '20104567' }}</small>
                        </div>
                        <div class="card-body p-4 p-md-4">
                            <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                                <div class="p-3 rounded-3" style="background: #ecfdf5; color: #047857;">
                                    <i class="bi bi-briefcase-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Kemitraan Industri Nasional</h6>
                                    <small class="text-muted">Kurikulum berbasis standar kebutuhan kerja nyata</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                                <div class="p-3 rounded-3" style="background: #fef3c7; color: #b45309;">
                                    <i class="bi bi-cpu-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Fasilitas Digital Mutakhir</h6>
                                    <small class="text-muted">Laboratorium komputer, IoT, dan multimedia interaktif</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-3" style="background: #f0fdf4; color: #15803d;">
                                    <i class="bi bi-patch-check-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Sertifikasi Profesi BNSP</h6>
                                    <small class="text-muted">Uji kompetensi terakreditasi bagi setiap lulusan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Interaktif Guru & Siswa (Poin 3 Tugas Demonstrasi) -->
    <section class="py-5" style="margin-top: -3rem; position: relative; z-index: 3;">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-lg-3">
                    <div class="stat-card-exclusive text-center h-100">
                        <div class="mb-2" style="color: #047857;">
                            <i class="bi bi-person-workspace fs-1"></i>
                        </div>
                        <h2 class="display-6 fw-extrabold mb-1" style="color: #022c22;">{{ $profil->jumlah_guru ?? 48 }}</h2>
                        <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Tenaga Pendidik / Guru</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-card-exclusive text-center h-100">
                        <div class="mb-2" style="color: #059669;">
                            <i class="bi bi-people-fill fs-1"></i>
                        </div>
                        <h2 class="display-6 fw-extrabold mb-1" style="color: #022c22;">{{ $profil->jumlah_siswa ?? 850 }}</h2>
                        <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Peserta Didik / Siswa</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-card-exclusive text-center h-100">
                        <div class="mb-2" style="color: #d97706;">
                            <i class="bi bi-door-open-fill fs-1"></i>
                        </div>
                        <h2 class="display-6 fw-extrabold mb-1" style="color: #022c22;">{{ $profil->jumlah_kelas ?? 24 }}</h2>
                        <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Rombel / Ruang Kelas</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-card-exclusive text-center h-100">
                        <div class="mb-2" style="color: #0284c7;">
                            <i class="bi bi-stars fs-1"></i>
                        </div>
                        <h2 class="display-6 fw-extrabold mb-1" style="color: #022c22;">6</h2>
                        <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Ekstrakurikuler Aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-5 bg-white border-top border-bottom">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-4 text-center">
                    <div class="position-relative d-inline-block p-2 rounded-4 shadow-sm" style="background: linear-gradient(135deg, #059669 0%, #f59e0b 100%);">
                        @if(!empty($profil->foto_kepala_sekolah))
                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah" class="img-fluid rounded-4" style="max-height: 320px; object-fit: cover;">
                        @else
                            <div class="bg-white rounded-4 d-flex flex-column align-items-center justify-content-center p-5" style="height: 300px; width: 260px;">
                                <i class="bi bi-person-bounding-box text-success" style="font-size: 5rem;"></i>
                                <span class="text-muted small mt-2 fw-semibold">Pimpinan Sekolah</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <span class="badge badge-emerald px-3 py-2 rounded-pill mb-2 text-uppercase">Sambutan Pimpinan</span>
                    <h2 class="fw-bold mb-3 text-dark">{{ $profil->nama_kepala_sekolah ?? 'Dr. H. Muhammad Arifin, M.Pd' }}</h2>
                    <p class="text-secondary fst-italic lead mb-4" style="line-height: 1.8;">
                        "{{ $profil->sambutan_kepala_sekolah ?? 'Kami berkomitmen menyelenggarakan pendidikan vokasi yang berkarakter, adaptif terhadap perkembangan teknologi, dan bermitra erat dengan Dunia Industri demi mencetak insan muda yang kompeten serta berdaya saing global.' }}"
                    </p>
                    <a href="{{ route('profil') }}" class="btn btn-outline-emerald rounded-pill px-4 py-2">
                        Pelajari Selengkapnya di Profil Sekolah <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Kegiatan Sekolah (Poin 3 Tugas Demonstrasi) -->
    <section class="py-5">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
                <div>
                    <span class="badge badge-emerald px-3 py-2 rounded-pill mb-2 text-uppercase">Informasi Aktual</span>
                    <h2 class="fw-extrabold text-dark mb-0">Berita Kegiatan Sekolah</h2>
                </div>
                <a href="{{ route('berita.index') }}" class="btn btn-emerald rounded-pill px-4 py-2 mt-3 mt-md-0 shadow-sm">
                    Lihat Seluruh Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($beritaTerbaru as $b)
                    <div class="col-md-4">
                        <div class="card h-100 school-card-exclusive">
                            <div class="position-relative bg-light" style="height: 210px;">
                                @if($b->gambar)
                                    <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3 text-center" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857;">
                                        <i class="bi bi-newspaper fs-1"></i>
                                        <small class="fw-semibold mt-1">Dokumentasi Warta</small>
                                    </div>
                                @endif
                                <span class="badge position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm" style="background: #065f46; color: white;">
                                    {{ $b->kategori }}
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <div class="text-muted small mb-2 d-flex align-items-center gap-2">
                                    <i class="bi bi-calendar3 text-success"></i>
                                    <span>{{ \Carbon\Carbon::parse($b->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                                </div>
                                <h5 class="card-title fw-bold mb-2">
                                    <a href="{{ route('berita.detail', $b->slug) }}" class="text-dark text-decoration-none" style="transition: color 0.2s;">
                                        {{ Str::limit($b->judul, 60) }}
                                    </a>
                                </h5>
                                <p class="card-text text-secondary small mb-4 flex-grow-1" style="line-height: 1.7;">
                                    {{ Str::limit($b->ringkasan, 110) }}
                                </p>
                                <a href="{{ route('berita.detail', $b->slug) }}" class="btn btn-outline-emerald btn-sm rounded-pill mt-auto fw-bold align-self-start px-3 py-1">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                        Belum ada berita kegiatan sekolah yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Galeri Cuplikan Interaktif (Poin 3 Tugas Demonstrasi) -->
    <section class="py-5 bg-white border-top">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4">
                <div>
                    <span class="badge badge-gold px-3 py-2 rounded-pill mb-2 text-uppercase">Dokumentasi Multimedia</span>
                    <h2 class="fw-extrabold text-dark mb-0">Galeri Kegiatan & Fasilitas</h2>
                </div>
                <a href="{{ route('galeri') }}" class="btn btn-outline-emerald rounded-pill px-4 py-2 mt-3 mt-md-0">
                    Buka Seluruh Album <i class="bi bi-images ms-1"></i>
                </a>
            </div>

            <div class="row g-3">
                @forelse($galeriTerbaru as $g)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm school-card-exclusive cursor-pointer" data-bs-toggle="modal" data-bs-target="#previewModal{{ $g->id }}">
                            <div class="bg-light position-relative" style="height: 150px;">
                                @if(Str::startsWith($g->gambar, 'http') || Str::contains($g->gambar, 'galeri-'))
                                    <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center p-2" style="background: linear-gradient(135deg, #ecfdf5 0%, #fef3c7 100%); color: #065f46;">
                                        <i class="bi bi-camera-fill fs-2 mb-1"></i>
                                        <span class="badge badge-emerald" style="font-size: 0.65rem;">{{ $g->kategori }}</span>
                                    </div>
                                @else
                                    <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}" class="w-100 h-100 object-fit-cover">
                                @endif
                            </div>
                            <div class="p-2 text-center bg-white">
                                <small class="fw-bold text-dark d-block text-truncate" title="{{ $g->judul }}">{{ $g->judul }}</small>
                            </div>
                        </div>

                        <!-- Modal Lightbox Preview -->
                        <div class="modal fade" id="previewModal{{ $g->id }}" tabindex="-1" aria-labelledby="previewModalLabel{{ $g->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow">
                                    <div class="modal-header border-0 pb-0">
                                        <h6 class="modal-title fw-bold text-dark" id="previewModalLabel{{ $g->id }}">{{ $g->judul }}</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center p-4">
                                        @if(Str::startsWith($g->gambar, 'http') || Str::contains($g->gambar, 'galeri-'))
                                            <div class="p-5 rounded-4 mb-3" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857;">
                                                <i class="bi bi-camera-fill fs-1"></i>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}" class="img-fluid rounded-4 mb-3 shadow-sm">
                                        @endif
                                        <span class="badge badge-emerald mb-2">{{ $g->kategori }}</span>
                                        <p class="text-muted small mb-0">{{ $g->keterangan ?? 'Dokumentasi kegiatan sekolah.' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        Belum ada dokumentasi kegiatan di galeri.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
