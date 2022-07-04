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
        Schema::create('docs_alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('ine',255)->default('SR');
            $table->string('acta_nac',255)->default('SR');
            $table->string('carta_aut',255)->default('SR');
            $table->unsignedTinyInteger('estado')->default('1');
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
        Schema::dropIfExists('docs_alumnos');
    }
};
