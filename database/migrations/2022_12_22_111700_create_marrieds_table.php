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
        Schema::create('marrieds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained('families')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('kawin', ['kawin', 'single']);
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
        Schema::dropIfExists('marrieds');
    }
};
