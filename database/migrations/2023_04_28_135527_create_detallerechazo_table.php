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
        Schema::create('detallerechazo', function (Blueprint $table) {
            $table->integer('idRechazo', true);
            $table->string('descripcionRechazo', 40);
            $table->date('fechaRechazo');
            $table->date('usuarioRechazo');
            $table->integer('idPromocion')->index('fk_detalleRechazo_promocion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallerechazo');
    }
};
