<?php
declare(strict_types=1);

namespace entities;

use app\entities\Calculator;
use app\entities\Distance;
use Exception;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function calc(): void
    {
        $distances = [];
        $calculator = new Calculator();

        $result = $calculator->calcCost($distances, 100);
        $this->assertEquals(10000, $result);

        $distances []= new Distance(100, 80);
        $result = $calculator->calcCost($distances, 150);
        $this->assertEquals(10000 + 50 * 80, $result);

        $distances []= new Distance(300, 70);
        $result = $calculator->calcCost($distances, 305);
        $this->assertEquals(10000 + 200 * 80 + 5 * 70, $result);
    }
}
