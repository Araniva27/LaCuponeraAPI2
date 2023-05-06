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
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('idCliente', true);
            $table->string('nombres', 40);
            $table->string('apellidos', 40);
            $table->string('correo', 50)->unique('correo');
            $table->string('direccion', 100);
            $table->string('dui', 10)->unique('dui');
            $table->string('telefono', 9)->unique('telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
};
