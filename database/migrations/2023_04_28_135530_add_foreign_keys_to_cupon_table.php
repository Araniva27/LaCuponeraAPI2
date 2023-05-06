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
        Schema::table('cupon', function (Blueprint $table) {
            $table->foreign(['idDetalleFactura'], 'fk_cupon_detalle')->references(['idDetalleFactura'])->on('detallefactura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cupon', function (Blueprint $table) {
            $table->dropForeign('fk_cupon_detalle');
        });
    }
};
