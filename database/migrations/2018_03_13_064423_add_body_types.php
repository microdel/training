<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Builder;

class AddBodyTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->getQueryBuilder()->insert([
            ['name' => 'Convertible'],
            ['name' => 'Coupe'],
            ['name' => 'Sedan'],
            ['name' => 'SUV'],
            ['name' => 'Van'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->getQueryBuilder()->delete();
    }

    /**
     * @return Builder
     */
    protected function getQueryBuilder(): Builder
    {
        return DB::table('body_types');
    }
}
