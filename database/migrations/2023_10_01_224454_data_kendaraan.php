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
        Schema::create('data_kendaraan', function (Blueprint $table) {

            $table->string('nopol', 10)->primary();
            $table->string('jenis_kendaraan', 4);
            $table->string('nama');
            $table->longText('alamat');
            $table->string('no_hp');
            $table->date('tgl_pkb');
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
        Schema::dropIfExists('data_kendaraan');
    }
};
