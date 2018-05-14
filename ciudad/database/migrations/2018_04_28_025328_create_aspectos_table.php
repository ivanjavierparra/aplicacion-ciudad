<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspectos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->mediumText('descripcion');
            $table->float('latitud', 40, 20);
            $table->float('longitud', 40, 20);
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedInteger('denunciante_id');
            $table->foreign('denunciante_id')->references('id')->on('denunciantes');
            $table->dateTime('fecha_ocurrencia')->nullable();
            $table->boolean('solucionado')->nullable();
            $table->enum('tipo', ['evento', 'estadoobjeto']);
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
        Schema::dropIfExists('aspectos');
    }
}
