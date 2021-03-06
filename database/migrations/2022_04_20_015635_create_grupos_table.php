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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')
                    ->constrained('carreras')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('clave', 8);
            $table->string('grupo', 8);
            $table->string('semestre', 10);
            $table->year('generacion');
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
        Schema::dropIfExists('grupos');
    }
};
