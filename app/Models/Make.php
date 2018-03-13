<?php

namespace App\Models;

use Saritasa\Database\Eloquent\Entity as Eloquent;

/**
 * Class Make
 *
 * @property int $id
 * @property string $name
 *
 * @property \Illuminate\Database\Eloquent\Collection $car_models
 *
 * @package App\Models
 */
class Make extends Eloquent
{
    const ID = 'id';
    const NAME = 'name';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
