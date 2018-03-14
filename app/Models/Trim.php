<?php

namespace App\Models;

use Saritasa\Database\Eloquent\Entity as Eloquent;

/**
 * Class Trim
 *
 * @property int $id
 * @property int $car_model_id
 * @property string $name
 *
 * @property \App\Models\CarModel $carModel
 * @property \Illuminate\Database\Eloquent\Collection $years
 *
 * @package App\Models
 */
class Trim extends Eloquent
{
    const ID = 'id';
    const NAME = 'name';
    const CAR_MODEL_ID = 'car_model_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        self::CAR_MODEL_ID => 'int'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::CAR_MODEL_ID,
        self::NAME
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function years()
    {
        return $this->hasMany(Year::class);
    }
}
