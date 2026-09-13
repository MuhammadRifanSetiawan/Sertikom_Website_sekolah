@extends('layouts.admin')

@section('judul', 'Kelola Berita')
@section('halaman_judul', 'Kelola Berita Kegiatan')

@section('konten')
<div class="card card-custom p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-extrabold mb-1 text-dark">Daftar Berita & Artikel</h5>
            <small class="text-muted">Kelola publikasi berita kegiatan, prestasi, dan agenda sekolah</small>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-emerald rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Berita Baru
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.berita.index') }}" method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-md-6 col-lg-4">
                <div class="input-group">
                    <input type="text" name="cari" value="{{ $cari }}" class="form-control" placeholder="Cari judul atau kategori...">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    @if($cari)
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-danger" title="Reset"><i class="bi bi-x-lg"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%;">Gambar</th>
                    <th style="width: 35%;">Judul Berita</th>
                    <th style="width: 15%;">Kategori</th>
                    <th style="width: 15%;">Tanggal Terbit</th>
                    <th style="width: 15%;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritaList as $index => $b)
                    <tr>
                        <td class="fw-bold text-muted">{{ $beritaList->firstItem() + $index }}</td>
                        <td>
                            @if($b->gambar)
                                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="rounded-3 object-fit-cover shadow-sm" style="width: 75px; height: 50px;">
                            @else
                                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 75px; height: 50px; background: #ecfdf5; color: #047857;">
                                    <i class="bi bi-image fs-5"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $b->judul }}</div>
                            <small class="text-muted text-truncate d-block" style="max-width: 320px;">{{ $b->ringkasan }}</small>
                        </td>
                        <td>
                            <span class="badge badge-emerald">{{ $b->kategori }}</span>
                        </td>
                        <td class="small text-muted">
                            {{ \Carbon\Carbon::parse($b->tanggal_publikasi)->translatedFormat('d F Y') }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('berita.detail', $b->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Lihat di Web">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-outline-warning" title="Ubah Data">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-folder-x fs-2 d-block mb-1 text-warning"></i>
                            Tidak ada data berita ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-end">
        {{ $beritaList->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
