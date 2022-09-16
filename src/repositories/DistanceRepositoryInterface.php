<?php
declare(strict_types=1);

namespace app\repositories;

use app\entities\Distance;

interface DistanceRepositoryInterface
{
    /**
     * @return Distance[]
     */
    public function all(): array;
}
