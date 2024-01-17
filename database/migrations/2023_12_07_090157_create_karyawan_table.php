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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('foto')->nullable();
            $table->string('nik')->unique();
            $table->enum('role',['SA','SS','AS','KRU'])->default('KRU');
            $table->string('password');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('jenis_operasi')->nullable();
            $table->string('asal_rig')->nullable();
            $table->string('asal_base')->nullable();
            $table->char('schedule',2)->nullable();
            $table->char('telepon',13)->nullable();
            $table->char('jenis_kelamin',12)->nullable();
            $table->char('agama',24)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('hse_passport_number')->nullable();
            $table->date('masa_berlaku_hse_passport')->nullable();
            $table->date('tanggal_mcu_terakhir')->nullable();
            $table->string('hasil_mcu')->nullable();
            $table->string('siml')->nullable();
            $table->string('keterangan_mcu')->nullable();
            $table->char('tinggi_badan',4)->nullable();
            $table->char('berat_badan',4)->nullable();
            $table->char('golongan_darah',3)->nullable();
            $table->date('tanggal_bst_terakhir')->nullable();
            $table->string('hasil_bst')->nullable();
            $table->string('apd_wajib')->nullable();
            $table->char('ukuran_coverall',5)->nullable();
            $table->char('ukuran_safety_shoes',3)->nullable();
            $table->char('ukuran_safety_gloves',4)->nullable();
            $table->char('ukuran_raincoat',4)->nullable();
            $table->char('nomor_relasi_darurat',14)->nullable();
            $table->string('nama_relasi_darurat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
