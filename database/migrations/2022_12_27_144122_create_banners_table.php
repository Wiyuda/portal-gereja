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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image_1');
            $table->string('title_1');
            $table->string('deskripsi_1');
            $table->string('image_2');
            $table->string('title_2');
            $table->string('deskripsi_2');
            $table->string('image_3');
            $table->string('title_3');
            $table->string('deskripsi_3');
            $table->enum('status', ['Active', 'Non Active']);
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
        Schema::dropIfExists('banners');
    }
};
