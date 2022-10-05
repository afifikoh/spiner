<?php

use iluminate\Broadcasting\Channel;
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
        Schema::create('kinerja', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('kd_dinas');
            // $table->string('bidang');
            // $table->string('nip');
            
            // $table->string('waktu');
            $table->string('hasil');
            $table->text('foto')->nullable();
            $table->text('doc')->nullable();
            $table->string('tgl');
            $table->enum("angka", ["0", "1"]);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('kinerja');
    }
};
