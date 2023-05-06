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
        Schema::create('empresa', function (Blueprint $table) {
            $table->integer('idEmpresa', true);
            $table->string('nombre', 100);
            $table->string('codigoEmpresa', 6);
            $table->string('direccion', 100);
            $table->string('nombreContacto', 100);
            $table->string('telefono', 100);
            $table->string('correo', 100);
            $table->float('comision', 10, 0);
            $table->integer('idRubro')->index('fk_empresa_rubro');
            $table->string('img', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
};
