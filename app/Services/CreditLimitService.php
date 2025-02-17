<?php

namespace App\Services;

class CreditLimitService
{
    public function calculate(float $coefficient, float $salaryUAH, float $requestLimit): float
    {
        return min($coefficient * $salaryUAH, $requestLimit);
    }
}
