<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'order_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('coin_id');
                $table->foreignId('order_id');
                $table->string('email');
                $table->timestamps();

                $table->foreign('coin_id')
                    ->on('coins')
                    ->references('id')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreign('order_id')
                    ->on('orders')
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
        Schema::dropIfExists('order_details');
    }
}
