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
        Schema::create('datos_tutores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 90);
            $table->string('apPat', 60);
            $table->string('apMat', 60);
            $table->string('correo', 60);
            $table->string('curp', 18);
            $table->string('telf_movil', 10);
            $table->string('telf_fijo', 10)->default('SR');
            $table->foreignId('id_parentesco')
                ->constrained('parentescos')
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
        Schema::dropIfExists('datos_tutores');
    }
};
