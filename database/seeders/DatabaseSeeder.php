<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProfilSekolah;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Pengguna
        User::create([
            'nama' => 'Administrator Sekolah',
            'email' => 'admin@sekolah.sch.id',
            'kata_sandi' => Hash::make('admin123'),
        ]);

        // 2. Profil Sekolah
        ProfilSekolah::create([
            'nama_sekolah' => 'SMK Negeri 1 Indonesia Merdeka',
            'npsn' => '20104567',
            'akreditasi' => 'A (Unggul)',
            'nama_kepala_sekolah' => 'Dr. H. Muhammad Arifin, M.Pd',
            'sambutan_kepala_sekolah' => 'Selamat datang di website resmi SMK Negeri 1 Indonesia Merdeka. Kami berkomitmen menyelenggarakan pendidikan vokasi yang berkarakter, adaptif terhadap perkembangan teknologi, dan bermitra erat dengan Dunia Industri untuk mencetak generasi muda yang kompeten serta berdaya saing global.',
            'foto_kepala_sekolah' => null,
            'alamat' => 'Jl. Pendidikan Vokasi No. 45, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12150',
            'telepon' => '(021) 78901234',
            'email' => 'info@smknegeri1.sch.id',
            'visi' => 'Menjadi pusat keunggulan pendidikan vokasi yang menghasilkan lulusan beriman, bertakwa, berakhlak mulia, kompeten, dan mandiri.',
            'misi' => "1. Menyelenggarakan pembelajaran berbasis kompetensi industri dan teknologi digital.\n2. Menumbuhkan budaya disiplin, integritas, dan etos kerja profesional.\n3. Menjalin kemitraan strategis dengan Dunia Usaha dan Dunia Industri (DUDI).\n4. Mendorong inovasi dan jiwa wirausaha di kalangan peserta didik.",
            'sejarah' => 'SMK Negeri 1 Indonesia Merdeka didirikan pada tahun 1995. Selama lebih dari 30 tahun berdiri, sekolah ini terus bertransformasi menjadi salah satu Sekolah Menengah Kejuruan Pusat Keunggulan dengan ribuan alumni yang telah berkiprah di perusahaan multinasional maupun berwirausaha mandiri.',
            'jumlah_guru' => 48,
            'jumlah_siswa' => 850,
            'jumlah_kelas' => 24,
        ]);

        // 3. Berita Kegiatan Sekolah
        $daftarBerita = [
            [
                'judul' => 'Upacara Peringatan Hari Kemerdekaan RI Berlangsung Khidmat',
                'slug' => Str::slug('Upacara Peringatan Hari Kemerdekaan RI Berlangsung Khidmat'),
                'kategori' => 'Kegiatan',
                'ringkasan' => 'Seluruh dewan guru, staf, dan siswa mengikuti upacara bendera peringatan HUT Kemerdekaan Republik Indonesia.',
                'isi' => 'Upacara bendera memperingati Hari Ulang Tahun Kemerdekaan Republik Indonesia berlangsung dengan penuh khidmat di lapangan utama sekolah. Bertindak sebagai pembina upacara adalah Kepala Sekolah yang dalam amanatnya menegaskan pentingnya semangat pantang menyerah, gotong royong, dan penguasaan teknologi digital bagi generasi muda penerus bangsa.',
                'gambar' => null,
                'tanggal_publikasi' => '2026-08-17',
            ],
            [
                'judul' => 'Siswa Raih Juara 1 Lomba Keterampilan Siswa (LKS) Bidang Web Technologies',
                'slug' => Str::slug('Siswa Raih Juara 1 Lomba Keterampilan Siswa LKS Bidang Web Technologies'),
                'kategori' => 'Prestasi',
                'ringkasan' => 'Prestasi gemilang kembali ditorehkan oleh siswa perwakilan kejuruan dalam ajang kompetisi tingkat provinsi.',
                'isi' => 'Prestasi membanggakan kembali diraih oleh ananda Rizky Pratama, siswa kelas XII Jurusan Rekayasa Perangkat Lunak, yang sukses meraih Medali Emas Juara 1 dalam Lomba Keterampilan Siswa (LKS) Tingkat Provinsi Bidang Web Technologies. Kompetisi ini menguji perancangan arsitektur aplikasi web fullstack, UI/UX interaktif, serta implementasi clean code berstandar industri.',
                'gambar' => null,
                'tanggal_publikasi' => '2026-08-25',
            ],
            [
                'judul' => 'Kunjungan Industri dan Penandatanganan Kerjasama dengan Mitra Perusahaan Teknologi',
                'slug' => Str::slug('Kunjungan Industri dan Penandatanganan Kerjasama dengan Mitra Perusahaan Teknologi'),
                'kategori' => 'Kerjasama',
                'ringkasan' => 'Sekolah memperkuat kurikulum berbasis industri melalui kemitraan strategis dengan perusahaan IT terkemuka.',
                'isi' => 'Dalam rangka memperkuat link and match antara dunia pendidikan dan dunia kerja, sekolah menandatangani nota kesepahaman (MoU) dengan 3 perusahaan teknologi nasional terkemuka. Program kerjasama ini mencakup guru tamu dari industri, fasilitas Praktik Kerja Lapangan (PKL), serta rekrutmen lulusan langsung.',
                'gambar' => null,
                'tanggal_publikasi' => '2026-09-02',
            ],
            [
                'judul' => 'Pelaksanaan Uji Sertifikasi Kompetensi Keahlian Bersama Asesor BNSP',
                'slug' => Str::slug('Pelaksanaan Uji Sertifikasi Kompetensi Keahlian Bersama Asesor BNSP'),
                'kategori' => 'Akademik',
                'ringkasan' => 'Ratusan siswa tingkat akhir mengikuti uji kompetensi keahlian untuk memperoleh sertifikat profesi resmi.',
                'isi' => 'Sebanyak 250 siswa tingkat akhir mengikuti pelaksanaan Uji Kompetensi Keahlian (UKK) yang dinilai langsung oleh tim asesor bersertifikat Badan Nasional Sertifikasi Profesi (BNSP). Ujian ini meliputi demonstrasi praktik pembuatan aplikasi web, penataan berkas kode terstruktur, dan wawancara pemahaman teknis.',
                'gambar' => null,
                'tanggal_publikasi' => '2026-09-08',
            ],
        ];

        foreach ($daftarBerita as $b) {
            Berita::create($b);
        }

        // 4. Ekstrakurikuler
        $daftarEkskul = [
            [
                'nama_ekskul' => 'Pramuka Gugus Depan',
                'nama_pembina' => 'Budi Santoso, S.Pd',
                'jadwal' => 'Setiap Jumat, 15.00 - 17.00 WIB',
                'deskripsi' => 'Membina kedisiplinan, kepemimpinan, kemandirian, dan semangat gotong royong melalui kegiatan kepramukaan yang dinamis di alam terbuka.',
                'gambar' => null,
            ],
            [
                'nama_ekskul' => 'Palang Merah Remaja (PMR)',
                'nama_pembina' => 'Siti Rahmawati, S.Kep',
                'jadwal' => 'Setiap Sabtu, 08.00 - 10.00 WIB',
                'deskripsi' => 'Melatih keterampilan pertolongan pertama (P3K), kesiapsiagaan bencana, dan menanamkan nilai-nilai kepedulian kemanusiaan bagi sesama.',
                'gambar' => null,
            ],
            [
                'nama_ekskul' => 'Paskibra Satuan Sekolah',
                'nama_pembina' => 'Hendra Wijaya, S.Pd',
                'jadwal' => 'Selasa & Kamis, 15.30 - 17.30 WIB',
                'deskripsi' => 'Membentuk sikap tegap, disiplin tinggi, kekompakan baris-berbaris, dan rasa cinta tanah air sebagai pengibar bendera pusaka sekolah.',
                'gambar' => null,
            ],
            [
                'nama_ekskul' => 'Futsal & Sepak Bola',
                'nama_pembina' => 'Ahmad Fauzi, S.Or',
                'jadwal' => 'Rabu & Sabtu, 16.00 - 18.00 WIB',
                'deskripsi' => 'Mengasah bakat dan ketangkasan bermain bola, strategi bertanding sportif, serta kebugaran jasmani siswa.',
                'gambar' => null,
            ],
            [
                'nama_ekskul' => 'Seni Tari & Musik Tradisional',
                'nama_pembina' => 'Dewi Lestari, S.Sn',
                'jadwal' => 'Setiap Senin, 15.00 - 17.00 WIB',
                'deskripsi' => 'Melestarikan warisan seni budaya Nusantara melalui tari kreasi daerah, karawitan, dan aransemen musik instrumen.',
                'gambar' => null,
            ],
            [
                'nama_ekskul' => 'Coding Club & Robotika',
                'nama_pembina' => 'Yosep Kurniawan, S.T',
                'jadwal' => 'Setiap Kamis, 14.30 - 16.30 WIB',
                'deskripsi' => 'Eksplorasi pemrograman web, algoritma komputasi, perakitan mikrokontroler, dan Internet of Things (IoT).',
                'gambar' => null,
            ],
        ];

        foreach ($daftarEkskul as $e) {
            Ekstrakurikuler::create($e);
        }

        // 5. Galeri Multimedia
        $daftarGaleri = [
            [
                'judul' => 'Laboratorium Komputer & Rekayasa Perangkat Lunak',
                'kategori' => 'Fasilitas',
                'gambar' => 'galeri-lab-komputer.jpg',
                'keterangan' => 'Laboratorium mutakhir ber-AC dengan PC spesifikasi tinggi untuk praktikum coding, basis data, dan desain grafis.',
            ],
            [
                'judul' => 'Upacara Bendera Senin Pagi di Lapangan Utama',
                'kategori' => 'Kegiatan',
                'gambar' => 'galeri-upacara.jpg',
                'keterangan' => 'Pembiasaan karakter dan kedisiplinan siswa melalui kegiatan upacara bendera rutin setiap hari Senin pagi.',
            ],
            [
                'judul' => 'Gelar Karya Inovasi dan Expo Teknologi Siswa',
                'kategori' => 'Akademik',
                'gambar' => 'galeri-expo.jpg',
                'keterangan' => 'Pameran produk teknologi, aplikasi software, dan karya kreatif hasil proyek pembelajaran berbasis industri.',
            ],
            [
                'judul' => 'Turnamen Futsal Antar Kelas (Classmeeting)',
                'kategori' => 'Olahraga',
                'gambar' => 'galeri-futsal.jpg',
                'keterangan' => 'Kompetisi persahabatan antar jurusan untuk menjunjung tinggi sportivitas dan rasa persaudaraan antar siswa.',
            ],
            [
                'judul' => 'Latihan Pioneering dan Tenda Pramuka Penegak',
                'kategori' => 'Kegiatan',
                'gambar' => 'galeri-pramuka.jpg',
                'keterangan' => 'Kegiatan luar ruangan anggota pramuka mengasah kekompakan tim dan keterampilan tali-temali.',
            ],
            [
                'judul' => 'Perpustakaan Digital dan Pojok Literasi Sekolah',
                'kategori' => 'Fasilitas',
                'gambar' => 'galeri-perpustakaan.jpg',
                'keterangan' => 'Ruang baca yang nyaman dengan ribuan koleksi buku fisik, majalah ilmiah, dan akses ribuan e-book digital.',
            ],
        ];

        foreach ($daftarGaleri as $g) {
            Galeri::create($g);
        }
    }
}
