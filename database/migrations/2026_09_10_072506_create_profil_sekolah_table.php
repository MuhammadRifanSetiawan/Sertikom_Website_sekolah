<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah', 150);
            $table->string('npsn', 20);
            $table->string('akreditasi', 10);
            $table->string('nama_kepala_sekolah', 150);
            $table->text('sambutan_kepala_sekolah')->nullable();
            $table->string('foto_kepala_sekolah')->nullable();
            $table->text('alamat');
            $table->string('telepon', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('sejarah')->nullable();
            $table->integer('jumlah_guru')->default(0);
            $table->integer('jumlah_siswa')->default(0);
            $table->integer('jumlah_kelas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
