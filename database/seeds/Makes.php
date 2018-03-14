<?php

use Illuminate\Database\Seeder;
use App\Models\Make;
use App\Models\CarModel;
use App\Models\Trim;
use App\Models\Year;

class Makes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Make::class, 10)->create()->each(function (Make $make) {
            factory(CarModel::class, rand(5, 10))->make()->each(function (CarModel $model) use ($make) {
                $make->carModels()->save($model);

                factory(Trim::class, rand(1, 5))->make()->each(function (Trim $trim) use ($model) {
                    $model->trims()->save($trim);

                    factory(Year::class, rand(1, 10))->make()->each(function (Year $year) use ($trim) {
                        $trim->years()->save($year);
                    });
                });
            });
        });
    }
}
