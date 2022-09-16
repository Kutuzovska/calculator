<?php
declare(strict_types=1);

namespace app\services;

use app\entities\Calculator;
use app\repositories\DistanceRepositoryInterface;
use Exception;

class CalculatorService
{
    public function __construct(
        private readonly Calculator                  $calculator,
        private readonly DistanceRepositoryInterface $repository,
    )
    {
    }


    /**
     * @throws Exception
     */
    public function calculateDistanceCost(int $distance): float
    {
        if ($distance <= 0)
            throw new Exception('Invalid distance');

        $distances = $this->repository->all();
        return $this->calculator->calcCost($distances, $distance);
    }
}
