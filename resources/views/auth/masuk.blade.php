@extends('layouts.publik')

@section('judul', 'Masuk Pengelola')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center py-4">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
                <div class="text-white text-center p-4 p-md-5" style="background: linear-gradient(135deg, #022c22 0%, #064e3b 100%);">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center p-3 mb-3 shadow" style="width: 64px; height: 64px; background: rgba(245, 158, 11, 0.2); color: #f59e0b;">
                        <i class="bi bi-shield-lock-fill fs-2"></i>
                    </div>
                    <h4 class="fw-extrabold mb-1 text-white">Portal Pengelola Sekolah</h4>
                    <small class="text-warning fw-semibold">Sistem Manajemen Konten Berbasis Laravel</small>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small rounded-3" role="alert">
                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('masuk.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small text-dark">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-success"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" value="{{ old('email', 'admin@sekolah.sch.id') }}" required autofocus placeholder="nama@sekolah.sch.id">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="kata_sandi" class="form-label fw-bold small text-dark">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-success"><i class="bi bi-key"></i></span>
                                <input type="password" name="kata_sandi" id="kata_sandi" class="form-control bg-light border-start-0 @error('kata_sandi') is-invalid @enderror" value="admin123" required placeholder="Masukkan kata sandi">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="ingat_saya" id="ingat_saya" class="form-check-input">
                                <label for="ingat_saya" class="form-check-label small text-muted">Ingat Sesi Saya</label>
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-emerald rounded-pill py-2 fw-bold shadow-sm">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                            </button>
                        </div>
                    </form>

                    <!-- Info Akun Demonstrasi untuk Asesor -->
                    <div class="rounded-4 p-3 text-center border" style="background: #ecfdf5;">
                        <small class="d-block fw-bold mb-1" style="color: #047857;"><i class="bi bi-info-circle-fill me-1"></i> Akun Demonstrasi Asesor / Penguji:</small>
                        <small class="text-dark d-block">Email: <code>admin@sekolah.sch.id</code></small>
                        <small class="text-dark d-block">Kata Sandi: <code>admin123</code></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
