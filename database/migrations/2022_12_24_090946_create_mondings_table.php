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
        Schema::create('mondings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_member_id')->constrained('family_members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('monding', ['Monding', 'Belum Monding']);
            $table->date('tgl')->nullable();
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
        Schema::dropIfExists('mondings');
    }
};
