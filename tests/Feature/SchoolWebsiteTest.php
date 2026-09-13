<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\ProfilSekolah;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SchoolWebsiteTest extends TestCase
{
    public function test_halaman_utama_beranda_menampilkan_menu_dan_statistik(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Beranda');
        $response->assertSee('Profil Sekolah');
        $response->assertSee('Ekstrakurikuler');
        $response->assertSee('Galeri');
        $response->assertSee('Berita');
        $response->assertSee('Tenaga Pendidik / Guru');
        $response->assertSee('Peserta Didik / Siswa');
    }

    public function test_halaman_profil_memiliki_tabel_informasi_profil_sekolah(): void
    {
        $response = $this->get('/profil');

        $response->assertStatus(200);
        $response->assertSee('Tabel Informasi Profil Sekolah');
        $response->assertSee('NPSN');
        $response->assertSee('Status Akreditasi');
        $response->assertSee('Bentuk Pendidikan');
    }

    public function test_halaman_ekskul_dan_galeri_dapat_diakses(): void
    {
        $this->get('/ekstrakurikuler')->assertStatus(200)->assertSee('Kegiatan Ekstrakurikuler');
        $this->get('/galeri')->assertStatus(200)->assertSee('Galeri Kegiatan Sekolah');
    }

    public function test_halaman_berita_dan_detail_berita(): void
    {
        $berita = Berita::first();
        $this->get('/berita')->assertStatus(200)->assertSee('Kabar & Berita Kegiatan Sekolah', false);
        
        if ($berita) {
            $this->get('/berita/' . $berita->slug)->assertStatus(200)->assertSee($berita->judul);
        }
    }

    public function test_autentikasi_masuk_pengelola(): void
    {
        $response = $this->post('/masuk', [
            'email' => 'admin@sekolah.sch.id',
            'kata_sandi' => 'admin123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();
    }

    public function test_crud_berita(): void
    {
        $user = User::first();

        // 1. Create Berita
        $response = $this->actingAs($user)->post('/admin/berita', [
            'judul' => 'Uji Coba Berita Baru Sertikom',
            'kategori' => 'Prestasi',
            'ringkasan' => 'Ringkasan singkat untuk pengujian otomatis CRUD.',
            'isi' => 'Konten lengkap pengujian otomatis CRUD berita sekolah.',
            'tanggal_publikasi' => date('Y-m-d'),
        ]);
        $response->assertRedirect('/admin/berita');

        $berita = Berita::where('judul', 'Uji Coba Berita Baru Sertikom')->first();
        $this->assertNotNull($berita);

        // 2. Update Berita
        $response = $this->actingAs($user)->put('/admin/berita/' . $berita->id, [
            'judul' => 'Uji Coba Berita Baru Sertikom (Diperbarui)',
            'kategori' => 'Prestasi',
            'ringkasan' => 'Ringkasan yang telah diperbarui.',
            'isi' => 'Konten lengkap yang telah diperbarui.',
            'tanggal_publikasi' => date('Y-m-d'),
        ]);
        $response->assertRedirect('/admin/berita');
        $this->assertDatabaseHas('berita', ['judul' => 'Uji Coba Berita Baru Sertikom (Diperbarui)']);

        // 3. Delete Berita
        $response = $this->actingAs($user)->delete('/admin/berita/' . $berita->id);
        $response->assertRedirect('/admin/berita');
        $this->assertDatabaseMissing('berita', ['id' => $berita->id]);
    }

    public function test_crud_ekstrakurikuler(): void
    {
        $user = User::first();

        // 1. Create Ekskul
        $response = $this->actingAs($user)->post('/admin/ekskul', [
            'nama_ekskul' => 'Ekskul Badminton Pengujian',
            'nama_pembina' => 'Pembina Test',
            'jadwal' => 'Setiap Rabu, 16.00 WIB',
            'deskripsi' => 'Deskripsi ekskul bulutangkis untuk pengujian.',
        ]);
        $response->assertRedirect('/admin/ekskul');

        $ekskul = Ekstrakurikuler::where('nama_ekskul', 'Ekskul Badminton Pengujian')->first();
        $this->assertNotNull($ekskul);

        // 2. Update Ekskul
        $response = $this->actingAs($user)->put('/admin/ekskul/' . $ekskul->id, [
            'nama_ekskul' => 'Ekskul Badminton Pengujian (Update)',
            'nama_pembina' => 'Pembina Test Update',
            'jadwal' => 'Setiap Kamis, 16.00 WIB',
            'deskripsi' => 'Deskripsi ekskul update.',
        ]);
        $response->assertRedirect('/admin/ekskul');
        $this->assertDatabaseHas('ekstrakurikuler', ['nama_ekskul' => 'Ekskul Badminton Pengujian (Update)']);

        // 3. Delete Ekskul
        $response = $this->actingAs($user)->delete('/admin/ekskul/' . $ekskul->id);
        $response->assertRedirect('/admin/ekskul');
        $this->assertDatabaseMissing('ekstrakurikuler', ['id' => $ekskul->id]);
    }

    public function test_crud_galeri_dan_profil_update(): void
    {
        Storage::fake('public');
        $user = User::first();

        $dummyJpeg = base64_decode('/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////wgALCAABAAEBAREA/8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPxA=');
        $file = UploadedFile::fake()->createWithContent('kegiatan.jpg', $dummyJpeg);
        $response = $this->actingAs($user)->post('/admin/galeri', [
            'judul' => 'Foto Dokumentasi Pengujian',
            'kategori' => 'Kegiatan',
            'gambar' => $file,
            'keterangan' => 'Keterangan dokumentasi pengujian.',
        ]);
        $response->assertRedirect('/admin/galeri');

        $galeri = Galeri::where('judul', 'Foto Dokumentasi Pengujian')->first();
        $this->assertNotNull($galeri);

        // 2. Update Galeri
        $response = $this->actingAs($user)->put('/admin/galeri/' . $galeri->id, [
            'judul' => 'Foto Dokumentasi Pengujian (Update)',
            'kategori' => 'Kegiatan',
            'keterangan' => 'Keterangan update.',
        ]);
        $response->assertRedirect('/admin/galeri');
        $this->assertDatabaseHas('galeri', ['judul' => 'Foto Dokumentasi Pengujian (Update)']);

        // 3. Delete Galeri
        $response = $this->actingAs($user)->delete('/admin/galeri/' . $galeri->id);
        $response->assertRedirect('/admin/galeri');
        $this->assertDatabaseMissing('galeri', ['id' => $galeri->id]);

        // 4. Update Profil Sekolah & Statistik
        $response = $this->actingAs($user)->put('/admin/profil', [
            'nama_sekolah' => 'SMK Negeri 1 Indonesia Merdeka',
            'npsn' => '20104567',
            'akreditasi' => 'A (Unggul)',
            'nama_kepala_sekolah' => 'Dr. H. Muhammad Arifin, M.Pd',
            'alamat' => 'Jl. Pendidikan Vokasi No. 45, Kebayoran Baru, Jakarta Selatan',
            'jumlah_guru' => 50,
            'jumlah_siswa' => 880,
            'jumlah_kelas' => 25,
        ]);
        $response->assertRedirect('/admin/profil');
        $this->assertDatabaseHas('profil_sekolah', [
            'jumlah_guru' => 50,
            'jumlah_siswa' => 880,
            'jumlah_kelas' => 25,
        ]);
    }
}
