<?php

namespace App\Models\Dto\OrderData;

use Saritasa\Dto;

/**
 * Class contains the order information.
 */
class OrderData extends Dto
{
    /**
     * Vin.
     *
     * @var string
     */
    public $vin;

    /**
     * Body type id.
     *
     * @var int
     */
    public $body_type_id;

    /**
     * Car make id.
     *
     * @var int
     */
    public $make_id;

    /**
     * Model car id.
     *
     * @var int
     */
    public $model_id;

    /**
     * Year id.
     *
     * @var int
     */
    public $year_id;

    /**
     * Trim id.
     *
     * @var int
     */
    public $trim_id;
}
