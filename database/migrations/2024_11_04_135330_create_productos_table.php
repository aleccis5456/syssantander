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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('producto_categoria_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('precio_venta');
            $table->integer('precio_compra');
            $table->integer('stock');
            $table->integer('stock_minimo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
