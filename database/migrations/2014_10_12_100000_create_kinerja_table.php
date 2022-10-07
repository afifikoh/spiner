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
            $table->unsignedInteger('id_users');
            // $table->string('kd_dinas');
            // $table->string('bidang');
            // $table->string('nip');
            
            // $table->string('waktu');
            $table->string('hasil');
            $table->text('foto')->nullable();
            $table->text('doc')->nullable();
            $table->string('tgl');
            $table->enum("status", ["pending", "draft", "success"]);
            $table->timestamps();
        });
        Schema::table('kinerja', function ($table) {
            $table
                ->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
