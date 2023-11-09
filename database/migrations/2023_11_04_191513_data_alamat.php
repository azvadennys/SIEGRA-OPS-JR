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
        Schema::create('data_alamat', function (Blueprint $table) {

            $table->string('alamat');

            $table->string('jenis');
            $table->unsignedBigInteger('data_kecelakaan_id');
            $table->foreign('data_kecelakaan_id')
                ->references('id')
                ->on('data_kecelakaan')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->char('villages_id', 10);
            $table->foreign('villages_id')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('data_alamat');
    }
};
