@extends('layouts.publik')

@section('judul', $berita->judul)

@section('konten')
    <!-- Breadcrumb Eksklusif -->
    <div class="bg-light py-3 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none" style="color: #047857;">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-decoration-none" style="color: #047857;">Berita</a></li>
                    <li class="breadcrumb-item active text-truncate text-muted" aria-current="page" style="max-width: 320px;">{{ $berita->judul }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            <!-- Isi Berita Utama -->
            <div class="col-lg-8">
                <article class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge badge-emerald px-3 py-2 rounded-pill">{{ $berita->kategori }}</span>
                        <span class="text-muted small">
                            <i class="bi bi-calendar3 me-1 text-success"></i> {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('l, d F Y') }}
                        </span>
                    </div>

                    <h1 class="display-6 fw-extrabold text-dark mb-4 lh-sm" style="letter-spacing: -0.02em;">{{ $berita->judul }}</h1>

                    @if($berita->gambar)
                        <div class="rounded-4 overflow-hidden mb-4 shadow-sm" style="max-height: 480px;">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100 h-100 object-fit-cover">
                        </div>
                    @endif

                    <div class="p-4 rounded-3 border-start border-4 mb-4 text-dark fst-italic" style="background: #ecfdf5; border-color: #047857 !important; line-height: 1.8;">
                        {{ $berita->ringkasan }}
                    </div>

                    <div class="text-secondary fs-6" style="line-height: 1.95; white-space: pre-line;">
                        {{ $berita->isi }}
                    </div>

                    <hr class="my-5">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-emerald rounded-pill px-4">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted small fw-semibold">Bagikan:</span>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar Berita Terkait -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 100px;">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-newspaper text-success me-2"></i> Berita Lainnya
                    </h5>

                    <div class="d-flex flex-column gap-3">
                        @foreach($beritaTerkait as $terkait)
                            <div class="d-flex gap-3 align-items-center pb-3 border-bottom">
                                <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 75px; height: 75px; background: #ecfdf5;">
                                    @if($terkait->gambar)
                                        <img src="{{ asset('storage/' . $terkait->gambar) }}" alt="{{ $terkait->judul }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-success">
                                            <i class="bi bi-newspaper fs-4"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">
                                        {{ \Carbon\Carbon::parse($terkait->tanggal_publikasi)->translatedFormat('d M Y') }}
                                    </small>
                                    <a href="{{ route('berita.detail', $terkait->slug) }}" class="text-dark text-decoration-none fw-bold small hover-emerald" style="line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $terkait->judul }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('berita.index') }}" class="btn btn-emerald w-100 rounded-pill py-2 shadow-sm">
                            Jelajahi Semua Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
