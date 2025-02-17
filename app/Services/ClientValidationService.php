<?php

namespace App\Services;

use Carbon\Carbon;

class ClientValidationService
{
    public function isValidAge(string $dateBirthday): bool
    {
        $age = abs(now()->diffInYears(Carbon::parse($dateBirthday)));
        return $age >= 18;
    }
}
