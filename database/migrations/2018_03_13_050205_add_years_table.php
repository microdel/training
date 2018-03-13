<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearsTable extends Migration
{
    private const FK_YEAR_TRIM = 'fk_year_trim';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trim_id');
            $table->integer('value');

            $table->foreign('trim_id', self::FK_YEAR_TRIM)
                ->on('trims')
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
        Schema::drop('years');
    }
}
