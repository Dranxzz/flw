<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'orders', function (Blueprint $table) {
                $table->id();
                $table->string('name_char');
                $table->decimal('amount', 12, 2);
                $table->enum('status', ['En Verificación','Aceptado','Rechazado']);
                $table->foreignId('product_id');
                $table->timestamps();

                $table->foreign('product_id')
                    ->on('products')
                    ->references('id')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
