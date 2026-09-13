@extends('layouts.admin')

@section('judul', 'Kelola Galeri')
@section('halaman_judul', 'Kelola Galeri Multimedia')

@section('konten')
<div class="card card-custom p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-extrabold mb-1 text-dark">Daftar Galeri Foto</h5>
            <small class="text-muted">Kelola dokumentasi foto kegiatan, sarana prasarana, dan dinamika pembelajaran</small>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-emerald rounded-pill px-4 shadow-sm">
            <i class="bi bi-cloud-arrow-up me-1"></i> Unggah Foto Galeri
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.galeri.index') }}" method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-md-6 col-lg-4">
                <div class="input-group">
                    <input type="text" name="cari" value="{{ $cari }}" class="form-control" placeholder="Cari judul atau kategori...">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    @if($cari)
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-danger" title="Reset"><i class="bi bi-x-lg"></i></a>
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
                    <th style="width: 15%;">Preview</th>
                    <th style="width: 30%;">Judul Foto</th>
                    <th style="width: 15%;">Kategori</th>
                    <th style="width: 20%;">Keterangan</th>
                    <th style="width: 15%;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeriList as $index => $g)
                    <tr>
                        <td class="fw-bold text-muted">{{ $galeriList->firstItem() + $index }}</td>
                        <td>
                            @if(Str::startsWith($g->gambar, 'http') || Str::contains($g->gambar, 'galeri-'))
                                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 75px; height: 50px; background: #ecfdf5; color: #047857;">
                                    <i class="bi bi-image fs-4"></i>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}" class="rounded-3 object-fit-cover shadow-sm" style="width: 75px; height: 50px;">
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $g->judul }}</td>
                        <td><span class="badge badge-emerald">{{ $g->kategori }}</span></td>
                        <td class="small text-muted">{{ Str::limit($g->keterangan, 50) ?? '-' }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.galeri.edit', $g->id) }}" class="btn btn-sm btn-outline-warning" title="Ubah Data">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')">
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
                            <i class="bi bi-images fs-2 d-block mb-1 text-warning"></i>
                            Tidak ada foto galeri ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-end">
        {{ $galeriList->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
