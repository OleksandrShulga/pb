<?php

namespace App\Services;

use Illuminate\Support\Str;

class ReferenceGeneratorService
{
    public function generate(): string
    {
        return substr(str_replace('-', '', Str::uuid()->toString()), 0, 30);
    }
}
