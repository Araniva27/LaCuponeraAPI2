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
        Schema::table('detallerechazo', function (Blueprint $table) {
            $table->foreign(['idPromocion'], 'fk_detalleRechazo_promocion')->references(['idPromocion'])->on('promocion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallerechazo', function (Blueprint $table) {
            $table->dropForeign('fk_detalleRechazo_promocion');
        });
    }
};
