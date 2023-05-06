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
        Schema::table('detallefactura', function (Blueprint $table) {
            $table->foreign(['idFactura'], 'fk_detalle_factura')->references(['idFactura'])->on('factura');
            $table->foreign(['idPromocion'], 'fk_detalle_promocion')->references(['idPromocion'])->on('promocion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallefactura', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_factura');
            $table->dropForeign('fk_detalle_promocion');
        });
    }
};
