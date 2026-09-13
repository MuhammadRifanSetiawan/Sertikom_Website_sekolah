@extends('layouts.publik')

@section('judul', 'Profil Sekolah')

@section('konten')
    <!-- Banner Halaman Profil Eksklusif -->
    <div class="page-header-exclusive">
        <div class="container text-center py-2">
            <span class="badge badge-gold px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Kelembagaan</span>
            <h1 class="display-5 fw-extrabold mb-2 text-white">Profil & Identitas Resmi Sekolah</h1>
            <p class="lead text-light opacity-90 mb-0">Mengenal visi, misi, rekam jejak sejarah, dan data pokok pendidikan sekolah</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            <!-- Kolom Konten Utama Kiri -->
            <div class="col-lg-8">
                <!-- Sambutan Pimpinan -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 52px; height: 52px; background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                            <i class="bi bi-quote fs-3"></i>
                        </div>
                        <div>
                            <span class="badge badge-emerald px-3 py-1 rounded-pill mb-1">Amanat Pimpinan</span>
                            <h4 class="fw-bold text-dark mb-0">Sambutan Kepala Sekolah</h4>
                            <small class="text-muted">{{ $profil->nama_kepala_sekolah ?? 'Dr. H. Muhammad Arifin, M.Pd' }}</small>
                        </div>
                    </div>
                    <p class="lead text-secondary fst-italic mb-0" style="line-height: 1.9; font-size: 1.08rem;">
                        "{{ $profil->sambutan_kepala_sekolah ?? 'Selamat datang di website resmi sekolah kami. Kami berkomitmen memberikan layanan pendidikan terbaik yang adaptif, inovatif, dan berakhlak mulia.' }}"
                    </p>
                </div>

                <!-- TABEL INFORMASI PROFIL SEKOLAH (Wajib Sesuai Poin 5 Tugas Demonstrasi) -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                        <div>
                            <span class="badge badge-gold px-3 py-2 rounded-pill fw-bold mb-2">
                                <i class="bi bi-table me-1"></i> Data Referensi Pendidikan
                            </span>
                            <h4 class="fw-extrabold text-dark mb-0">Tabel Informasi Profil Sekolah</h4>
                        </div>
                        <span class="badge badge-emerald px-3 py-2 rounded-pill">Status: Aktif / Terverifikasi</span>
                    </div>

                    <p class="text-secondary small mb-4">
                        Tabel di bawah menyajikan seluruh rincian identitas sekolah resmi yang terdaftar pada sistem pendataan pendidikan nasional:
                    </p>

                    <div class="table-responsive rounded-3 overflow-hidden border">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="text-white text-center" style="background: linear-gradient(135deg, #064e3b 0%, #047857 100%);">
                                <tr>
                                    <th style="width: 6%;" class="py-3">No</th>
                                    <th style="width: 34%;" class="py-3 text-start ps-3">Parameter Informasi</th>
                                    <th style="width: 60%;" class="py-3 text-start ps-3">Keterangan Data Resmi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fw-bold text-muted">1</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-building text-success me-2"></i>Nama Resmi Sekolah</td>
                                    <td class="fw-bold ps-3" style="color: #065f46;">{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Indonesia Merdeka' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">2</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-upc-scan text-success me-2"></i>NPSN</td>
                                    <td class="ps-3"><span class="badge bg-dark px-3 py-2 fs-6 font-monospace">{{ $profil->npsn ?? '20104567' }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">3</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-patch-check-fill text-warning me-2"></i>Status Akreditasi</td>
                                    <td class="ps-3">
                                        <span class="badge badge-gold px-3 py-2 fs-6">
                                            <i class="bi bi-check-circle-fill me-1"></i> Terakreditasi {{ $profil->akreditasi ?? 'A' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">4</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-diagram-3 text-success me-2"></i>Bentuk Pendidikan</td>
                                    <td class="ps-3 fw-semibold text-dark">Sekolah Menengah Kejuruan (SMK) - Pusat Keunggulan</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">5</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-person-badge-fill text-success me-2"></i>Kepala Sekolah</td>
                                    <td class="fw-bold text-dark ps-3">{{ $profil->nama_kepala_sekolah ?? 'Dr. H. Muhammad Arifin, M.Pd' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">6</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-book-half text-success me-2"></i>Kurikulum</td>
                                    <td class="ps-3 text-dark">Kurikulum Merdeka Berbasis Standar Dunia Industri (DUDI)</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">7</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-person-workspace text-success me-2"></i>Jumlah Tenaga Pendidik</td>
                                    <td class="ps-3"><strong class="fs-6 text-success">{{ $profil->jumlah_guru ?? 48 }}</strong> Tenaga Guru & Pendidik Profesional</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">8</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-people-fill text-success me-2"></i>Jumlah Peserta Didik</td>
                                    <td class="ps-3"><strong class="fs-6 text-primary">{{ $profil->jumlah_siswa ?? 850 }}</strong> Siswa Aktif Terdaftar</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">9</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-grid-fill text-warning me-2"></i>Jumlah Rombel (Kelas)</td>
                                    <td class="ps-3"><strong class="fs-6 text-warning">{{ $profil->jumlah_kelas ?? 24 }}</strong> Ruang Kelas Pembelajaran</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">10</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Alamat Lengkap</td>
                                    <td class="ps-3 text-secondary">{{ $profil->alamat ?? 'Jl. Pendidikan Vokasi No. 45, Kebayoran Baru, Jakarta Selatan' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">11</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-telephone-fill text-success me-2"></i>Nomor Telepon</td>
                                    <td class="ps-3 font-monospace">{{ $profil->telepon ?? '(021) 78901234' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-bold text-muted">12</td>
                                    <td class="fw-bold text-dark ps-3"><i class="bi bi-envelope-at-fill text-warning me-2"></i>Email Kontak Resmi</td>
                                    <td class="ps-3 font-monospace">{{ $profil->email ?? 'info@smknegeri1.sch.id' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Visi & Misi -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white">
                    <h4 class="fw-extrabold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-compass text-success me-2"></i> Visi & Misi Sekolah
                    </h4>
                    
                    <div class="mb-4">
                        <span class="badge badge-emerald px-3 py-1 rounded-pill mb-2">Visi Kelembagaan</span>
                        <div class="p-3 rounded-3 border-start border-4 fw-semibold text-dark" style="background: #ecfdf5; border-color: #047857 !important; font-size: 1.05rem; line-height: 1.8;">
                            "{{ $profil->visi ?? 'Menjadi institusi pendidikan kejuruan yang menghasilkan insan berakhlak mulia, kompeten, dan mandiri.' }}"
                        </div>
                    </div>

                    <div>
                        <span class="badge badge-gold px-3 py-1 rounded-pill mb-2">Misi Strategis</span>
                        <div class="text-secondary ps-2" style="white-space: pre-line; line-height: 1.9;">
                            {{ $profil->misi ?? "1. Menyelenggarakan proses pembelajaran vokasi berbasis standar industri.\n2. Menumbuhkan nilai integritas, etos kerja profesional, dan kepemimpinan.\n3. Menjalin kemitraan erat dengan Dunia Usaha dan Dunia Industri." }}
                        </div>
                    </div>
                </div>

                <!-- Sejarah Singkat -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <h4 class="fw-extrabold text-dark mb-3 pb-2 border-bottom">
                        <i class="bi bi-hourglass-split text-success me-2"></i> Sejarah Sekolah
                    </h4>
                    <p class="text-secondary" style="line-height: 1.9;">
                        {{ $profil->sejarah ?? 'Sekolah ini didirikan dengan tekad luhur memajukan kualitas sumber daya manusia Indonesia melalui penguasaan sains terapan, teknologi terbarukan, dan keahlian vokasional berstandar nasional.' }}
                    </p>
                </div>
            </div>

            <!-- Kolom Samping Kanan -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 100px;">
                    <div class="text-center mb-4">
                        <div class="p-1 rounded-4 d-inline-block mb-3 shadow-sm" style="background: linear-gradient(135deg, #059669 0%, #f59e0b 100%);">
                            @if(!empty($profil->foto_kepala_sekolah))
                                <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah" class="img-fluid rounded-4" style="max-height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-white rounded-4 d-flex align-items-center justify-content-center p-4" style="width: 140px; height: 140px;">
                                    <i class="bi bi-person-circle fs-1 text-success"></i>
                                </div>
                            @endif
                        </div>
                        <h5 class="fw-bold text-dark mb-1">{{ $profil->nama_kepala_sekolah ?? 'Dr. H. Muhammad Arifin, M.Pd' }}</h5>
                        <small class="text-muted fw-semibold">Kepala Sekolah</small>
                    </div>

                    <hr class="my-3">

                    <h6 class="fw-bold text-dark mb-3">Statistik Inti Sekolah</h6>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted small"><i class="bi bi-person-workspace text-success me-2"></i>Guru & Staf</span>
                        <span class="fw-bold text-dark">{{ $profil->jumlah_guru ?? 48 }} Orang</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted small"><i class="bi bi-people text-primary me-2"></i>Siswa Terdaftar</span>
                        <span class="fw-bold text-dark">{{ $profil->jumlah_siswa ?? 850 }} Siswa</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted small"><i class="bi bi-door-open text-warning me-2"></i>Jumlah Rombel</span>
                        <span class="fw-bold text-dark">{{ $profil->jumlah_kelas ?? 24 }} Rombel</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <span class="text-muted small"><i class="bi bi-patch-check text-success me-2"></i>Akreditasi</span>
                        <span class="badge badge-gold">Nilai {{ $profil->akreditasi ?? 'A' }}</span>
                    </div>

                    <div class="mt-4 pt-2">
                        <a href="{{ route('berita.index') }}" class="btn btn-emerald w-100 rounded-pill py-2 shadow-sm">
                            <i class="bi bi-newspaper me-1"></i> Baca Berita Sekolah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
