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
 public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('idpengguna');
            $table->string('userid', 25);
            $table->string('pass', 25);
            $table->string('namalengkap', 100);
            $table->string('jabatan', 50); // Koreksi di sini
            $table->tinyInteger('level');
            $table->tinyInteger('is_activated');
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
        Schema::dropIfExists('pengguna');
    }
};
