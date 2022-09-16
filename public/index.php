<?php
declare(strict_types=1);

/**
 * Использую только для автолоадинга классов
 */
require(__DIR__ . '/../vendor/autoload.php');

use app\entities\Calculator;
use app\repositories\ArrayDistanceRepository;
use app\services\CalculatorService;

/**
 * Поскольку не используем DI, передает явно
 */
$repository = new ArrayDistanceRepository();
$calculator = new Calculator();
$service = new CalculatorService($calculator, $repository);

$result = $service->calculateDistanceCost(305);
echo $result . PHP_EOL;
