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
            $table->String('rubro');
            $table->String('subrubro');
            $table->String('producto');
            $table->String('marca');
            $table->Integer('stock');
            $table->Float('precio_costo');
            $table->String('foto');
            $table->Float('iva')->nullable();
            $table->Float('ibb')->nullable();
            $table->Float('impuesto_provincia')->nullable();
            $table->Float('precio_venta')->nullable();
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
