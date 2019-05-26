<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationOrderPlates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plate', function(Blueprint $table){
            $table->increments('code');
            $table->unsignedInteger('code_plate');
            $table->foreign('code_plate')
                    ->references('code')->on('plates')
                    ->onDelete('cascade');
            $table->unsignedInteger('code_orders');
            $table->foreign('code_orders')
                    ->references('code')->on('orders')
                    ->onDelete('cascade');
            $table->double('value', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_plate');
    }
}
