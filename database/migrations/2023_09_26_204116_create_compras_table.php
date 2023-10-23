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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('clien_id')->unsigned();

            $table->date('com_fecha');
            $table->string('com_factura', 50);
            $table->string('com_ruc', 50);
            $table->string('com_proveedor', 50);
            $table->string('com_concepto', 20);
            $table->float('com_decuento',20)->nullable();
            $table->float('com_subtotal',20);
            $table->string('com_tipo_ret', 100)->nullable();
            $table->string('com_noretdgi', 10)->nullable();
            $table->float('com_retgdi',20)->nullable();
            $table->string('com_noretalma', 10)->nullable();
            $table->float('com_retalma',20)->nullable();
            $table->float('com_iva',20)->nullable();
            $table->string('com_observacion', 100)->nullable();
            $table->float('com_total',30);
            $table->string('com_formadepago', 20)->nullable();
            $table->string('com_nodocpago', 20)->nullable();
            $table->string('com_empresa', 20);
            $table->date('com_periodo');
            
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
        Schema::dropIfExists('compras');
    }
};