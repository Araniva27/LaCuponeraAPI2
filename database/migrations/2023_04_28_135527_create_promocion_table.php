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
        Schema::create('promocion', function (Blueprint $table) {
            $table->integer('idPromocion', true);
            $table->string('titulo', 100);
            $table->float('precio', 10, 0);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('cantidad');
            $table->text('descripcion');
            $table->integer('estadoActivo');
            $table->integer('estadoAprobacion');
            $table->integer('idEmpresa')->index('fk_promocion_empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocion');
    }
};
