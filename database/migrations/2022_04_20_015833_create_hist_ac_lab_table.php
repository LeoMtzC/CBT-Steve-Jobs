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
        Schema::create('hist_ac_lab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_docu')
                    ->constrained('documentos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_alumno')
                    ->constrained('alumnos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('url',255); //url del documento
            $table->foreignId('id_escenario')
                    ->nullable()
                    ->constrained('escenarios')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->unsignedSmallInteger('horascumpl')
                    ->default(0);
            $table->date('fecha_ini');
            $table->date('fecha_term');
            $table->date('fecha_exp');
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
        Schema::dropIfExists('hist_ac_lab');
    }
};
