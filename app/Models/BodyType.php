<?php

namespace App\Models;

use Saritasa\Database\Eloquent\Entity as Eloquent;

/**
 * Class BodyType
 *
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class BodyType extends Eloquent
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
}
