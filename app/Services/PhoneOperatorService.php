<?php

namespace App\Services;

class PhoneOperatorService
{
    private $operators;

    public function __construct()
    {
        $this->operators = config('operators');
    }

    /**
     * Отримує коефіцієнт в залежності від префіксу телефонного номера.
     *
     * Метод перевіряє префікс телефонного номера і повертає відповідний коефіцієнт для мобільного оператора.
     *
     * @param  string  $phone Телефонний номер, для якого потрібно визначити коефіцієнт.
     * @return float Коефіцієнт для мобільного оператора.
     */
    public function getCoefficient(string $phone): float
    {
        $operators = config('operators');

        return match (true) {
            array_reduce($operators['kyivstar'], fn($carry, $prefix) => $carry || str_starts_with($phone, $prefix), false) => 0.95, // Kyivstar
            array_reduce($operators['vodafone'], fn($carry, $prefix) => $carry || str_starts_with($phone, $prefix), false) => 0.94, // Vodafone
            array_reduce($operators['lifecall'], fn($carry, $prefix) => $carry || str_starts_with($phone, $prefix), false) => 0.93, // Lifecell
            default => 0.92,
        };
    }
}
