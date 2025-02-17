<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConversionService
{
    /**
     * Конвертує суму в валюті у гривні (UAH) на основі поточного курсу.
     *
     * @param  float  $amount Сума, яку потрібно конвертувати.
     * @param  string  $currency Валюта, в яку потрібно конвертувати суму.
     * @return float Конвертована сума у гривнях (UAH).
     *
     * @throws \Illuminate\Http\Client\RequestException Якщо не вдалося отримати дані курсу.
     */
    public function convertToUAH(float $amount, string $currency): float {
        if ($currency === 'UAH') return $amount;
        $response = Http::get('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5')->json();
        foreach ($response as $rate) {
            if ($rate['ccy'] === $currency) return $amount * $rate['sale'];
        }
        return $amount;
    }
}
