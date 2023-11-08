<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kecelakaan', function (Blueprint $table) {
            $table->id();
            $table->string('nopol', 10);
            $table->foreign('nopol')
                ->references('nopol')
                ->on('data_kendaraan')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('asal_berkas');
            $table->string('instansi');
            $table->string('samsat');
            $table->string('pembuat_laporan');
            $table->string('tgl_laporan');
            $table->string('no_laporan');
            $table->string('nama_korban');
            $table->string('umur');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('no_berkas');
            $table->string('status');
            $table->string('kasus_kecelakaan');
            $table->bigInteger('cedera');
            $table->bigInteger('tgl_kejadian');
            $table->bigInteger('nominal_santunan');
            $table->bigInteger('tgl_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kecelakaan');
    }
};
