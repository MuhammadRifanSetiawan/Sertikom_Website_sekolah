@extends('layouts.publik')

@section('judul', 'Ekstrakurikuler')

@section('konten')
    <!-- Banner Ekstrakurikuler Eksklusif -->
    <div class="page-header-exclusive">
        <div class="container text-center py-2">
            <span class="badge badge-gold px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Talenta & Prestasi</span>
            <h1 class="display-5 fw-extrabold mb-2 text-white">Kegiatan Ekstrakurikuler</h1>
            <p class="lead text-light opacity-90 mb-0">Salurkan minat, bakat, karakter kepemimpinan, dan kreativitas melalui pilihan ekskul unggulan</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            @forelse($ekskulList as $ekskul)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 school-card-exclusive border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="position-relative bg-light" style="height: 220px;">
                            @if($ekskul->gambar)
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="{{ $ekskul->nama_ekskul }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3 text-center" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857;">
                                    <i class="bi bi-trophy-fill fs-1 mb-1"></i>
                                    <span class="small fw-bold">Pengembangan Bakat Siswa</span>
                                </div>
                            @endif
                            <span class="badge badge-gold position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-clock-fill me-1"></i> Rutin Mingguan
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-extrabold text-dark mb-3">{{ $ekskul->nama_ekskul }}</h5>
                            
                            <div class="mb-2 d-flex align-items-center gap-2 small">
                                <span class="rounded-circle p-1 d-inline-flex align-items-center justify-content-center" style="background: #ecfdf5; color: #059669; width: 28px; height: 28px;">
                                    <i class="bi bi-person-badge"></i>
                                </span>
                                <span class="text-secondary">Pembina: <strong class="text-dark">{{ $ekskul->nama_pembina }}</strong></span>
                            </div>

                            <div class="mb-3 d-flex align-items-center gap-2 small">
                                <span class="rounded-circle p-1 d-inline-flex align-items-center justify-content-center" style="background: #fef3c7; color: #d97706; width: 28px; height: 28px;">
                                    <i class="bi bi-calendar-event"></i>
                                </span>
                                <span class="text-secondary">Jadwal: <strong class="text-dark">{{ $ekskul->jadwal }}</strong></span>
                            </div>

                            <p class="text-secondary small flex-grow-1 mb-0" style="line-height: 1.7;">
                                {{ $ekskul->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-stars fs-1 d-block mb-2 text-warning"></i>
                    Belum ada data kegiatan ekstrakurikuler.
                </div>
            @endforelse
        </div>
    </div>
@endsection
