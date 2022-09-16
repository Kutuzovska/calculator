<?php
declare(strict_types=1);

namespace app\entities;

use Exception;

class Distance
{
    private int $start;
    private float $cost;

    /**
     * @throws Exception
     */
    public function __construct(int $start, float $cost)
    {
        if ($start < 0)
            throw new Exception('Invalid long');


        if ($cost <= 0)
            throw new Exception('Invalid cost');

        $this->start = $start;
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }
}
