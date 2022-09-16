<?php
declare(strict_types=1);

namespace entities;

use app\entities\Calculator;
use app\entities\Distance;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    /** @test */
    public function calc()
    {
        $distances = [];
        $calculator = new Calculator();

        $result = $calculator->calcCost($distances, 100);
        $this->assertEquals($result, 10000);

        $distances []= new Distance(100, 80);
        $result = $calculator->calcCost($distances, 150);
        $this->assertEquals($result, 10000 + 50 * 80);

        $distances []= new Distance(300, 70);
        $result = $calculator->calcCost($distances, 305);
        $this->assertEquals($result, 10000 + 200 * 80 + 5 * 70);
    }
}
