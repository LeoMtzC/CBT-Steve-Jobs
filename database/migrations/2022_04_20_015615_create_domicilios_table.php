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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_estado')
                    ->constrained('estados')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_muni')
                    ->constrained('municipios')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('calle', 180);
            $table->string('colonia', 180);
            $table->string('cp', 5);
            $table->string('no_ext', 7);
            $table->string('no_int', 7)->nullable();
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
        Schema::dropIfExists('domicilios');
    }
};
