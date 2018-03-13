<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrimsTable extends Migration
{
    private const FK_TRIM_CAR_MODEL = 'fk_trim_car_model';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trims', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_model_id');
            $table->string('name', 100);

            $table->foreign('car_model_id', self::FK_TRIM_CAR_MODEL)
                ->on('car_models')
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
        Schema::drop('trims');
    }
}
