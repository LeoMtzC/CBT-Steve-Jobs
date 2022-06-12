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
        Schema::create('escenarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEsc', 90);
            $table->string('direccion', 250);
            $table->string('nombreResp', 90);
            $table->string('apPatResp', 90);
            $table->string('apMatResp', 90);
            $table->string('telefono', 10);
            $table->unsignedTinyInteger('estado');
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
        Schema::dropIfExists('escenarios');
    }
};
