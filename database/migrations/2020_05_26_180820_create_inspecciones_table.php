<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->bigIncrements('id');//
            $table->timestamp('fechahora');// = Column(DateTime)
            $table->integer('idinspeccion');
            $table->integer('codigoControl')->nullable();// = Column(Integer)
            $table->integer('estado');// = Column(Integer, nullable = False)
            $table->string('recomendacion',200)->nullable();// = Column(String(200, convert_unicode=True))
            $table->tinyInteger('elementoAusente')->nullable()->default(false);// = Column(Boolean, default=False) 
            $table->tinyInteger('elementoObstruido')->nullable()->default(false);// = Column(Boolean, default=False) 
            $table->tinyInteger('elementoIncompatible')->nullable()->default(false);// = Column(Boolean, default=False) 
            $table->tinyInteger('elementoVencido')->nullable()->default(false);// = Column(Boolean, default=False) 
            $table->tinyInteger('elementoNoRegistrado')->nullable()->default(false);// = Column(Boolean, default=False) 
            $table->tinyInteger('elementoSustituto')->nullable()->default(false);// = Column(Boolean, default=False)
            $table->string('row_type',200);// = Column(String(200, convert_unicode=True))
            $table->string('codigoSustituto',200)->nullable();// = Column(String(200, convert_unicode=True))
            $table->string('codigoEquipoSustituto',200)->nullable();// = Column(String(200, convert_unicode=True))
            $table->string('incidencias',1000)->nullable();// = Column(String(200, convert_unicode=True))
            $table->string('observaciones',1000)->nullable();// = Column(String(200, convert_unicode=True))
            $table->timestamps();

            #[  Se crean las restricciones de clave externa para:sectores_id y equipos_id]
                $table->bigInteger('revision_periodica_id')->unsigned()->index();
                $table->foreign('revision_periodica_id')->references('id')->on('revision_periodicas');
                
                $table->bigInteger('puesto_id')->unsigned()->index();
                $table->foreign('puesto_id')->references('id')->on('puestos');
                
                $table->bigInteger('elemento_id')->nullable()->unsigned()->index();
                $table->foreign('elemento_id')->references('id')->on('elementos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspecciones');
    }
}
