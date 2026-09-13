@extends('layouts.admin')

@section('judul', 'Kelola Ekstrakurikuler')
@section('halaman_judul', 'Kelola Ekstrakurikuler')

@section('konten')
<div class="card card-custom p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-extrabold mb-1 text-dark">Daftar Ekstrakurikuler</h5>
            <small class="text-muted">Kelola data kegiatan ekskul pembinaan minat, bakat, dan talenta siswa</small>
        </div>
        <a href="{{ route('admin.ekskul.create') }}" class="btn btn-emerald rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Ekskul Baru
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.ekskul.index') }}" method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-md-6 col-lg-4">
                <div class="input-group">
                    <input type="text" name="cari" value="{{ $cari }}" class="form-control" placeholder="Cari nama ekskul atau pembina...">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    @if($cari)
                        <a href="{{ route('admin.ekskul.index') }}" class="btn btn-outline-danger" title="Reset"><i class="bi bi-x-lg"></i></a>
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
                    <th style="width: 15%;">Foto</th>
                    <th style="width: 25%;">Nama Ekstrakurikuler</th>
                    <th style="width: 20%;">Pembina</th>
                    <th style="width: 20%;">Jadwal Latihan</th>
                    <th style="width: 15%;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ekskulList as $index => $e)
                    <tr>
                        <td class="fw-bold text-muted">{{ $ekskulList->firstItem() + $index }}</td>
                        <td>
                            @if($e->gambar)
                                <img src="{{ asset('storage/' . $e->gambar) }}" alt="{{ $e->nama_ekskul }}" class="rounded-3 object-fit-cover shadow-sm" style="width: 65px; height: 45px;">
                            @else
                                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 65px; height: 45px; background: #ecfdf5; color: #047857;">
                                    <i class="bi bi-trophy fs-5"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $e->nama_ekskul }}</td>
                        <td>{{ $e->nama_pembina }}</td>
                        <td><span class="badge border" style="background: #f8fafc; color: #334155;">{{ $e->jadwal }}</span></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.ekskul.edit', $e->id) }}" class="btn btn-sm btn-outline-warning" title="Ubah Data">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.ekskul.destroy', $e->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ekstrakurikuler ini?')">
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
                            <i class="bi bi-stars fs-2 d-block mb-1 text-warning"></i>
                            Tidak ada data ekstrakurikuler.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-end">
        {{ $ekskulList->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
