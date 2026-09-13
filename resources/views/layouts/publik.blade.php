<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Website Resmi Sekolah') - SMK Negeri 1 Indonesia Merdeka</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #065f46;
            --brand-primary-hover: #047857;
            --brand-primary-dark: #022c22;
            --brand-primary-subtle: #ecfdf5;
            --brand-gold: #d97706;
            --brand-gold-subtle: #fef3c7;
            --brand-slate-dark: #091316;
            --brand-surface: #ffffff;
            --brand-border: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Top Bar */
        .top-announcement {
            background-color: var(--brand-primary-dark);
            color: #93c5fd;
            font-size: 0.8rem;
            letter-spacing: 0.02em;
        }

        /* Navigation */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(6, 95, 70, 0.1);
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--brand-primary-dark) !important;
            letter-spacing: -0.03em;
        }
        .nav-link {
            font-weight: 600;
            color: #475569 !important;
            padding: 0.6rem 1.1rem !important;
            transition: all 0.25s ease;
            border-radius: 999px;
            font-size: 0.92rem;
        }
        .nav-link:hover {
            color: var(--brand-primary) !important;
            background-color: var(--brand-primary-subtle);
        }
        .nav-link.active {
            color: white !important;
            background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-primary-hover) 100%);
            box-shadow: 0 4px 12px rgba(6, 95, 70, 0.25);
        }

        /* Theme Buttons */
        .btn-emerald {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white !important;
            border: none;
            font-weight: 600;
            transition: all 0.25s ease;
        }
        .btn-emerald:hover {
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(4, 120, 87, 0.3);
        }
        .btn-outline-emerald {
            border: 2px solid var(--brand-primary);
            color: var(--brand-primary) !important;
            font-weight: 600;
            background: transparent;
            transition: all 0.25s ease;
        }
        .btn-outline-emerald:hover {
            background-color: var(--brand-primary);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(6, 95, 70, 0.2);
        }
        .btn-gold {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white !important;
            border: none;
            font-weight: 600;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(217, 119, 6, 0.3);
        }

        /* Hero */
        .hero-section-exclusive {
            background: linear-gradient(135deg, #022c22 0%, #064e3b 40%, #091316 100%);
            color: white;
            padding: 5rem 0 4.5rem;
            position: relative;
            overflow: hidden;
        }
        .hero-section-exclusive::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.18) 0%, rgba(6, 78, 59, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Cards & Stat */
        .stat-card-exclusive {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.75rem 1.5rem;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .stat-card-exclusive:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px -4px rgba(6, 95, 70, 0.15);
            border-color: rgba(6, 95, 70, 0.3);
        }
        .stat-card-exclusive::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--brand-primary), var(--brand-gold));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .stat-card-exclusive:hover::after {
            opacity: 1;
        }

        .school-card-exclusive {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            background: white;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
        .school-card-exclusive:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px -5px rgba(6, 95, 70, 0.12);
            border-color: rgba(5, 150, 105, 0.3);
        }

        .badge-emerald {
            background-color: var(--brand-primary-subtle);
            color: var(--brand-primary);
            font-weight: 700;
            border: 1px solid rgba(6, 95, 70, 0.2);
        }
        .badge-gold {
            background-color: var(--brand-gold-subtle);
            color: #b45309;
            font-weight: 700;
            border: 1px solid rgba(217, 119, 6, 0.2);
        }

        /* Banner Pages */
        .page-header-exclusive {
            background: linear-gradient(135deg, #022c22 0%, #064e3b 60%, #0f172a 100%);
            color: white;
            padding: 4.5rem 0 3.5rem;
            position: relative;
        }

        /* Footer */
        footer.footer-exclusive {
            margin-top: auto;
            background: #061e18;
            color: #94a3b8;
            border-top: 4px solid var(--brand-gold);
        }
        .footer-exclusive a.hover-gold:hover {
            color: var(--brand-gold) !important;
            transform: translateX(4px);
            transition: all 0.2s;
        }

        /* Lightbox Image Preview */
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
    @yield('style')
</head>
<body>

    <!-- Top Announcement Bar -->
    <div class="top-announcement py-2 d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-4 text-light">
                <span><i class="bi bi-geo-alt-fill text-warning me-1"></i> Kebayoran Baru, Jakarta Selatan</span>
                <span><i class="bi bi-clock-fill text-warning me-1"></i> Jam Operasional: Senin - Jumat (07.00 - 16.00 WIB)</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white-50">Akreditasi: <strong class="text-warning">A (Unggul)</strong></span>
                <span class="text-white-50">|</span>
                <a href="{{ route('masuk') }}" class="text-light text-decoration-none hover-gold small">
                    <i class="bi bi-shield-lock me-1"></i> Portal Admin
                </a>
            </div>
        </div>
    </div>

    <!-- Header & Navigasi -->
    <header class="sticky-top navbar-custom shadow-sm">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('beranda') }}">
                    <span class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; background: linear-gradient(135deg, #059669 0%, #022c22 100%); color: #f59e0b;">
                        <i class="bi bi-mortarboard-fill fs-4"></i>
                    </span>
                    <div>
                        <div class="lh-1 fw-extrabold" style="font-size: 1.2rem; color: var(--brand-primary-dark);">SMK NEGERI 1</div>
                        <small class="text-muted fw-bold" style="font-size: 0.72rem; letter-spacing: 0.1em;">INDONESIA MERDEKA</small>
                    </div>
                </a>

                <button class="navbar-toggler border-0 shadow-none p-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-2 text-dark"></i>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1 my-3 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                                <i class="bi bi-house-door me-1"></i> Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">
                                <i class="bi bi-building me-1"></i> Profil Sekolah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('ekskul') ? 'active' : '' }}" href="{{ route('ekskul') }}">
                                <i class="bi bi-stars me-1"></i> Ekstrakurikuler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">
                                <i class="bi bi-images me-1"></i> Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                                <i class="bi bi-newspaper me-1"></i> Berita
                            </a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2 pt-2 pt-lg-0">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-emerald btn-sm px-4 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-speedometer2 me-1"></i> Panel Admin
                            </a>
                        @else
                            <a href="{{ route('masuk') }}" class="btn btn-outline-emerald btn-sm px-4 py-2 rounded-pill">
                                <i class="bi bi-person-lock me-1"></i> Masuk Admin
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow-1">
        @if(session('sukses'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center rounded-4 shadow-sm border-0 bg-success-subtle text-success" role="alert">
                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                    <div class="fw-semibold">{{ session('sukses') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center rounded-4 shadow-sm border-0 bg-danger-subtle text-danger" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>
                    <div class="fw-semibold">{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @yield('konten')
    </main>

    <!-- Footer Sekolah Eksklusif -->
    <footer class="footer-exclusive py-5 text-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: linear-gradient(135deg, #059669 0%, #047857 100%); color: #f59e0b;">
                            <i class="bi bi-mortarboard-fill fs-4"></i>
                        </span>
                        <div>
                            <h5 class="mb-0 text-white fw-bold">SMK NEGERI 1</h5>
                            <small class="text-warning fw-semibold" style="letter-spacing: 0.1em; font-size: 0.75rem;">INDONESIA MERDEKA</small>
                        </div>
                    </div>
                    <p class="text-light opacity-75 small mb-4" style="line-height: 1.8;">
                        Institusi pendidikan vokasi terkemuka berakreditasi unggul yang berorientasi pada integritas etika, kompetensi industri modern, dan kepemimpinan masa depan.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm rounded-circle text-white" style="background: rgba(255,255,255,0.1); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-sm rounded-circle text-white" style="background: rgba(255,255,255,0.1); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-sm rounded-circle text-white" style="background: rgba(255,255,255,0.1); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn btn-sm rounded-circle text-white" style="background: rgba(255,255,255,0.1); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-6 col-lg-4">
                    <h6 class="text-warning fw-bold text-uppercase mb-3" style="letter-spacing: 0.05em; font-size: 0.85rem;">Navigasi Utama</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2 text-light opacity-75">
                        <li><a href="{{ route('beranda') }}" class="text-light text-decoration-none hover-gold d-inline-block"><i class="bi bi-chevron-right text-warning me-1"></i> Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="text-light text-decoration-none hover-gold d-inline-block"><i class="bi bi-chevron-right text-warning me-1"></i> Profil Sekolah & Akreditasi</a></li>
                        <li><a href="{{ route('ekskul') }}" class="text-light text-decoration-none hover-gold d-inline-block"><i class="bi bi-chevron-right text-warning me-1"></i> Kegiatan Ekstrakurikuler</a></li>
                        <li><a href="{{ route('galeri') }}" class="text-light text-decoration-none hover-gold d-inline-block"><i class="bi bi-chevron-right text-warning me-1"></i> Galeri Dokumentasi</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-light text-decoration-none hover-gold d-inline-block"><i class="bi bi-chevron-right text-warning me-1"></i> Berita & Kabar Sekolah</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-4">
                    <h6 class="text-warning fw-bold text-uppercase mb-3" style="letter-spacing: 0.05em; font-size: 0.85rem;">Informasi Kantor</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-3 text-light opacity-75">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-geo-alt-fill text-warning mt-1"></i>
                            <span>Jl. Pendidikan Vokasi No. 45, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12150</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-telephone-fill text-warning"></i>
                            <span>(021) 78901234</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-envelope-fill text-warning"></i>
                            <span>info@smknegeri1.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 border-secondary opacity-25">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-light opacity-75">
                <div>&copy; {{ date('Y') }} SMK Negeri 1 Indonesia Merdeka. Seluruh Hak Cipta Dilindungi.</div>
                <div class="mt-2 mt-md-0">
                    <span class="badge badge-gold px-3 py-1">Sertifikasi Junior Web Developer BNSP</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>
</html>
