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
        Schema::create('deudores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('deduda_total');
            $table->integer('pago_inicial')->nullable();
            $table->integer('saldo');
            $table->string('descripcion');
            $table->string('estado');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudores');
    }
};
