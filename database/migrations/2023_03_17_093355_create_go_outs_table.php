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
        Schema::create('go_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained('sectors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('family_id')->constrained('families')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('family_member_id')->constrained('family_members')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['Keluar', 'Dikeluarkan']);
            $table->date('tgl');
            $table->text('keterangan');
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
        Schema::dropIfExists('go_outs');
    }
};
