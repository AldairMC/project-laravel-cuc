<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationPlatesIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plate_ingredients', function(Blueprint $table){
            $table->increments('code');
            $table->unsignedInteger('code_plate');
            $table->foreign('code_plate')
                    ->references('code')->on('plates')
                    ->onDelete('cascade');
            $table->unsignedInteger('code_ingredient');
            $table->foreign('code_ingredient')
                    ->references('code')->on('ingredients')
                    ->onDelete('cascade');
            $table->double('quantity', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plate_ingredients');
    }
}
