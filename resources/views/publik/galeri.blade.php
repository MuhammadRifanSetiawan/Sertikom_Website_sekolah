@extends('layouts.publik')

@section('judul', 'Galeri Multimedia')

@section('konten')
    <!-- Banner Galeri Eksklusif -->
    <div class="page-header-exclusive">
        <div class="container text-center py-2">
            <span class="badge badge-gold px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Dokumentasi Visual</span>
            <h1 class="display-5 fw-extrabold mb-2 text-white">Galeri Kegiatan Sekolah & Fasilitas</h1>
            <p class="lead text-light opacity-90 mb-0">Arsip multimedia dokumentasi pembelajaran, sarana prasarana modern, dan dinamika prestasi</p>
        </div>
    </div>

    <div class="container py-5">
        <!-- Filter Kategori Elegan -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <a href="{{ route('galeri') }}" class="btn {{ empty($kategori) || $kategori == 'Semua' ? 'btn-emerald' : 'btn-outline-secondary' }} rounded-pill px-4 py-2 fw-semibold">
                Semua Kategori
            </a>
            @foreach($daftarKategori as $kat)
                <a href="{{ route('galeri', ['kategori' => $kat]) }}" class="btn {{ $kategori == $kat ? 'btn-emerald' : 'btn-outline-secondary' }} rounded-pill px-4 py-2 fw-semibold">
                    {{ $kat }}
                </a>
            @endforeach
        </div>

        <!-- Grid Galeri -->
        <div class="row g-4">
            @forelse($galeriList as $g)
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden school-card-exclusive cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $g->id }}">
                        <div class="position-relative bg-light" style="height: 240px;">
                            @if(Str::startsWith($g->gambar, 'http') || Str::contains($g->gambar, 'galeri-'))
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-center" style="background: linear-gradient(135deg, #ecfdf5 0%, #fef3c7 100%); color: #065f46;">
                                    <i class="bi bi-camera-fill fs-1 mb-2"></i>
                                    <span class="fw-bold small">{{ $g->judul }}</span>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}" class="w-100 h-100 object-fit-cover">
                            @endif
                            <span class="badge position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm" style="background: #065f46; color: white;">
                                {{ $g->kategori }}
                            </span>
                            <span class="badge bg-dark bg-opacity-75 position-absolute bottom-0 end-0 m-3 px-2 py-1 rounded-pill small">
                                <i class="bi bi-zoom-in me-1"></i> Perbesar
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="fw-extrabold text-dark mb-2">{{ $g->judul }}</h6>
                            <p class="text-secondary small mb-0" style="line-height: 1.7;">
                                {{ $g->keterangan ?? 'Dokumentasi kegiatan dan fasilitas sekolah.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Modal Preview Gambar -->
                    <div class="modal fade" id="modalFoto{{ $g->id }}" tabindex="-1" aria-labelledby="modalFotoLabel{{ $g->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                                <div class="modal-header border-0 pb-0 pe-4 pt-3">
                                    <h6 class="modal-title fw-bold text-dark" id="modalFotoLabel{{ $g->id }}">{{ $g->judul }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-4">
                                    @if(Str::startsWith($g->gambar, 'http') || Str::contains($g->gambar, 'galeri-'))
                                        <div class="p-5 rounded-4 mb-3" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857;">
                                            <i class="bi bi-camera-fill" style="font-size: 4rem;"></i>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}" class="img-fluid rounded-4 mb-3 shadow-sm" style="max-height: 500px; width: 100%; object-fit: contain;">
                                    @endif
                                    <span class="badge badge-emerald px-3 py-2 rounded-pill mb-2">{{ $g->kategori }}</span>
                                    <p class="text-secondary mt-2 px-md-5">{{ $g->keterangan ?? 'Dokumentasi kegiatan sekolah.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-images fs-1 d-block mb-2 text-warning"></i>
                    Tidak ada galeri foto yang ditemukan pada kategori ini.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $galeriList->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
