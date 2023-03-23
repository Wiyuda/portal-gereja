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
        Schema::table('marrieds', function (Blueprint $table) {
            $table->dropColumn('gereja');
            $table->dropColumn('asal_gereja_calon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marrieds', function (Blueprint $table) {
            $table->string('gereja', 50);
            $table->string('asal_gereja_calon', 100);
        });
    }
};
