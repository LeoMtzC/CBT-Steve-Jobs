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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 10)->default('SR');
            $table->string('nombre', 90);
            $table->string('apPat', 90);
            $table->string('apMat', 90);
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_carrera')
                ->constrained('carreras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_grupo')
                ->constrained('grupos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedTinyInteger('semestre');
            $table->year('generacion');
            $table->string('curp', 18)->default('SR');
            $table->string('telefono', 10)->default('SR');
            $table->string('correo', 60)->default('SR');
            $table->foreignId('id_domicilio')
                ->nullable()
                ->constrained('domicilios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('fecha_nac');
            $table->string('nss', 11)->default('SR');
            $table->char('seguro_med', 1);
            $table->foreignId('id_tutor')
                ->nullable()
                ->constrained('datos_tutores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_docs')
                ->nullable()
                ->constrained('docs_alumnos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('alumnos');
    }
};
