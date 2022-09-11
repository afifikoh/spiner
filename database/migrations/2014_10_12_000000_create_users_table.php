<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table->increments("id");
            $table->string("kode_dinas");
            $table->string("bidang");
            $table->string("nip");
            $table->string("nik");
            $table->string("nama");
            $table->date("tgl_lahir");
            $table->enum("jk", ["Perempuan", "Laki-laki"]);
            $table->string("alamat");
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("no_hp");
            $table->string("password");
            $table->string("thn_masuk");
            $table->string("pend_terakhir");
            $table->string("bln_masuk");
            $table->string("foto");
            $table->string("level");
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users");
    }
};