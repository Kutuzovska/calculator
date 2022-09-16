<?php
declare(strict_types=1);

namespace app\entities;

use Exception;

class Calculator
{
    private const DEFAULT_COST = 100;

    /**
     * @param Distance[] $distances
     * @param int $distance
     * @return float
     *
     * @throws Exception
     */
    public function calcCost(array $distances, int $distance): float
    {
        $countDistances = count($distances);
        if (count($distances) === 0)
            return self::DEFAULT_COST * $distance;

        /**
         * Плохая практика изменять перменную из входных параметров
         */
        if ($distances[0]->getStart() !== 0) {
            array_unshift($distances, new Distance(0, self::DEFAULT_COST));
            $countDistances++;
        }

        $result = 0;
        $remainingDistance = $distance;
        for ($i = 0; $i < $countDistances; $i++) {
            if ($remainingDistance <= 0) break;

            $currentDistance = $distances[$i];
            $nextDistance = $distances[$i + 1] ?? null;

            if (!is_null($nextDistance)) {
                $slice = $nextDistance->getStart() - $currentDistance->getStart();
                $remainingDistance -= $slice;

                if ($remainingDistance >= 0) $result += $slice * $currentDistance->getCost(); else
                    $result += ($slice - $remainingDistance) * $currentDistance->getCost();
            } else {
                $result += $remainingDistance * $currentDistance->getCost();
                $remainingDistance = 0;
            }
        }

        return $result;
    }
}
