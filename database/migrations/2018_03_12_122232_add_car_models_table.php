<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarModelsTable extends Migration
{
    private const FK_FOREIGN_MODEL_MAKE = 'fk_car_models_make';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('make_id');
            $table->string('name', 200);

            $table->foreign('make_id', self::FK_FOREIGN_MODEL_MAKE)
                ->on('makes')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_models');
    }
}
