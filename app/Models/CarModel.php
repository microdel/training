<?php

namespace App\Models;

use Saritasa\Database\Eloquent\Entity as Eloquent;

/**
 * Class CarModel
 *
 * @property int $id
 * @property int $make_id
 * @property string $name
 *
 * @property \App\Models\Make $make
 * @property \Illuminate\Database\Eloquent\Collection $trims
 * @property \Illuminate\Database\Eloquent\Collection $years
 *
 * @package App\Models
 */
class CarModel extends Eloquent
{
    const ID = 'id';
    const MAKE_ID = 'make_id';
    const NAME = 'name';

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
        self::MAKE_ID => 'int'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::MAKE_ID,
        self::NAME
    ];

    public function carMake()
    {
        return $this->belongsTo(Make::class);
    }

    public function trims()
    {
        return $this->hasMany(Trim::class);
    }

    public function years()
    {
        return $this->hasMany(Year::class, 'trim_id');
    }
}
