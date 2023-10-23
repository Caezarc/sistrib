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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('clien_id')->unsigned();
            
            $table->date('ven_fecha');
            $table->string('ven_factura', 50);
            $table->string('ven_ruc', 50);
            $table->string('ven_cliente', 50);
            $table->string('ven_exento', 20);
            $table->string('ven_exonerado', 20);
            $table->string('ven_descuento', 20);
            $table->float('ven_subtotal',20);
            $table->string('ven_noretdgi', 10)->nullable();
            $table->float('ven_retgdi',20)->nullable();
            $table->string('ven_noretalma', 10)->nullable();
            $table->float('ven_retalma',20)->nullable();
            $table->float('ven_iva',20)->nullable();
            $table->string('ven_tipo_ret', 100)->nullable();
            $table->string('ven_observacion', 100)->nullable();
            $table->float('ven_total',30);
            $table->string('ven_formadepago', 20)->nullable();
            $table->string('ven_nodocpago', 20)->nullable();
            $table->string('ven_empresa', 20);
            $table->date('ven_periodo');
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('clien_id')->references('id')->on('clientes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
