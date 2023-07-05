<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecSalida');
            // Idcheckin, idMetodoPago, idVenta
            $table->foreignId('idCheckin');
            $table->foreignId('idMetodoPago');
            $table->foreignId('idVenta');
            $table->integer('estado');
            $table->timestamps();

            $table->foreign('idCheckin')
                ->references('id')
                ->on('checkins')
                ->onDelete('cascade');

            $table->foreign('idMetodoPago')
                ->references('id')
                ->on('pagos')
                ->onDelete('cascade');

            $table->foreign('idVenta')
                ->references('id')
                ->on('ventas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropForeign(['idCheckin']);
            $table->dropForeign(['idMetodoPago']);
            $table->dropForeign(['idVenta']);
        });
        Schema::dropIfExists('checkouts');
    }
};
