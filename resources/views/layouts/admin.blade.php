<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Admin Panel') - Panel Pengelola Sekolah</title>
    
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
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            overflow-x: hidden;
        }
        .admin-sidebar {
            width: 270px;
            min-height: 100vh;
            background: #022c22;
            color: #94a3b8;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
        }
        .admin-content {
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-brand {
            padding: 1.5rem 1.5rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }
        .sidebar-menu {
            padding: 1.25rem 0.85rem;
        }
        .sidebar-heading {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #10b981;
            padding: 0.85rem 0.75rem 0.35rem;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            color: #cbd5e1;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 0.25rem;
        }
        .sidebar-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(3px);
        }
        .sidebar-link.active {
            color: white;
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(4, 120, 87, 0.35);
        }
        .top-navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            box-shadow: 0 1px 4px rgba(0,0,0,0.02);
        }
        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }
        .btn-emerald {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white !important;
            border: none;
            font-weight: 600;
        }
        .btn-emerald:hover {
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.3);
        }
        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: -270px;
            }
            .admin-sidebar.show {
                margin-left: 0;
            }
            .admin-content {
                margin-left: 0;
            }
        }
    </style>
    @yield('style')
</head>
<body>

    <!-- Sidebar Admin -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <span class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center" style="background: rgba(16, 185, 129, 0.2); color: #34d399;">
                <i class="bi bi-shield-check fs-4"></i>
            </span>
            <div>
                <div class="lh-1 text-white fw-bold" style="font-size: 1.05rem;">PANEL KELOLA</div>
                <small class="text-warning fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.05em;">SMK NEGERI 1</small>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-heading">Menu Ikhtisar</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 fs-5"></i>
                <span>Dashboard</span>
            </a>

            <div class="sidebar-heading mt-3">Pengelolaan Konten (CRUD)</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper fs-5"></i>
                <span>Kelola Berita</span>
            </a>
            <a href="{{ route('admin.ekskul.index') }}" class="sidebar-link {{ request()->routeIs('admin.ekskul.*') ? 'active' : '' }}">
                <i class="bi bi-stars fs-5"></i>
                <span>Ekstrakurikuler</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="bi bi-images fs-5"></i>
                <span>Galeri Multimedia</span>
            </a>

            <div class="sidebar-heading mt-3">Konfigurasi Lembaga</div>
            <a href="{{ route('admin.profil.index') }}" class="sidebar-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                <i class="bi bi-building-gear fs-5"></i>
                <span>Profil & Statistik</span>
            </a>

            <div class="sidebar-heading mt-3">Akses Publik</div>
            <a href="{{ route('beranda') }}" target="_blank" class="sidebar-link text-warning">
                <i class="bi bi-box-arrow-up-right fs-5"></i>
                <span>Buka Website Publik</span>
            </a>
        </div>
    </aside>

    <!-- Content Area -->
    <div class="admin-content">
        <!-- Top Navbar -->
        <header class="top-navbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary d-lg-none rounded-circle p-2" id="sidebarToggle" aria-label="Menu">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <h5 class="mb-0 fw-bold text-dark">@yield('halaman_judul', 'Dashboard')</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                        <i class="bi bi-person-fill fs-5"></i>
                    </span>
                    <div class="d-none d-md-block">
                        <div class="fw-bold text-dark lh-1" style="font-size: 0.875rem;">{{ Auth::user()->nama ?? 'Admin' }}</div>
                        <small class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email ?? '' }}</small>
                    </div>
                </div>

                <form action="{{ route('keluar') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold">
                        <i class="bi bi-box-arrow-right me-1"></i> Keluar
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Body -->
        <main class="p-3 p-md-4 flex-grow-1">
            @if(session('sukses'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center rounded-4 shadow-sm border-0 bg-success-subtle text-success mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                    <div class="fw-semibold">{{ session('sukses') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center rounded-4 shadow-sm border-0 bg-danger-subtle text-danger mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>
                    <div class="fw-semibold">{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm border-0 bg-danger-subtle text-danger mb-4" role="alert">
                    <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Terjadi kesalahan input:</div>
                    <ul class="mb-0 small ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('konten')
        </main>

        <footer class="p-3 text-center text-muted small border-top bg-white">
            &copy; {{ date('Y') }} Panel Pengelola Website Sekolah - Skema Sertifikasi BNSP Junior Web Developer
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }
    </script>
    @yield('script')
</body>
</html>
