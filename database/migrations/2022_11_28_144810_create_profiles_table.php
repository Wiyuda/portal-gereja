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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tahun');
            $table->string('pendiri', 50);
            $table->string('pendeta_resort', 50)->nullable();
            $table->string('pendeta_jemaat', 50)->nullable();
            $table->string('guru_huria', 50)->nullable();
            $table->text('sintua')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('profiles');
    }
};
