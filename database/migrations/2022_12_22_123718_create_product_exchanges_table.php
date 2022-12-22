<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_exchanges', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id');
                $table->foreignId('coin_id');
                $table->decimal('amount', 12, 2);
                $table->timestamps();

                $table->foreign('product_id')
                    ->on('products')
                    ->references('id')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreign('coin_id')
                    ->on('coins')
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
        Schema::dropIfExists('product_exchanges');
    }
}
