<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueMedicamentoTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos_estoque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicamento_id')->constrained()->onDelete('cascade');
            $table->string('batch_id');
            $table->date('expiry_date');
            $table->integer('quantity');
            $table->decimal('mrp', 10, 2);
            $table->decimal('rate', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos_estoque');
    }
}
