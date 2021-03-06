<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestoescalerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestoescaleras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoElemento')->nullable();
            $table->string('mismoElemento')->nullable();
            $table->string('modelo')->nullable();
            $table->string('descripcion')->nullable();
            $table->tinyInteger('cantidad_escalones')->nullable();
            $table->bigInteger('anio')->nullable();
            $table->timestamps();
            #[  Se crean las restricciones de clave externa para:puesto_id]
                $table->bigInteger('puesto_id')->unsigned()->index();
                $table->foreign('puesto_id')->references('id')->on('puestos');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestoescaleras');
    }
}
