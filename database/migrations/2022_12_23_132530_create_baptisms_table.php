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
        Schema::create('baptisms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_keluarga_id')->constrained('family_members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('baptis', ['baptis', 'belum baptis']);
            $table->date('tanggal')->nullable();
            $table->string('gereja', 50)->nullable();
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
        Schema::dropIfExists('baptisms');
    }
};
