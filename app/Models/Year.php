<?php

namespace App\Models;

use Saritasa\Database\Eloquent\Entity as Eloquent;

/**
 * Class Year
 *
 * @property int $id
 * @property int $trim_id
 * @property int $value
 *
 * @property \App\Models\Trim $trim
 *
 * @package App\Models
 */
class Year extends Eloquent
{
    const ID = 'id';
    const TRIM_ID = 'trim_id';
    const VALUE = 'value';

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
        'trim_id' => 'int',
        'value' => 'int'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trim_id',
        'value'
    ];

    public function trim()
    {
        return $this->belongsTo(Trim::class);
    }
}
