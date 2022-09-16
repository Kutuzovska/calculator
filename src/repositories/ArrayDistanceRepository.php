<?php
declare(strict_types=1);

namespace app\repositories;

use app\entities\Distance;
use Exception;

/**
 * Лучше написать свой Exception
 * по типу NotFoundDistancesException
 */
class ArrayDistanceRepository implements DistanceRepositoryInterface
{
    /**
     * Сильной проверки на уникальность дистанции не делаю
     * Это можно переложить на хранилище
     *
     * @var array{ array{ int, float } }
     */
    private array $list = [
        [0, 100],
        [100, 80],
        [300, 70],
    ];

    /**
     * Здесь можно создать Distance не через конструктор, так как из репозитория нам приходят
     * доверенные данные. Можно исопльзовать Reflection API, для создания класса.
     *
     * @throws Exception
     */
    public function all(): array
    {
        $distances = array_map(fn($value) => new Distance($value[0], $value[1]), $this->list);
        usort($distances, fn(Distance $a, Distance $b) => $a->getStart() - $b->getStart());
        return $distances;
    }
}
