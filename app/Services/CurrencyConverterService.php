<?php

namespace App\Services;

class CurrencyConverterService {

    const RATES = [
        'usd' => [
            'egp' => 16,
            'aed' => 6,
            'sar' => 5
        ]
    ];

    public function convert($amount, $from, $to)
    {
        $rate = self::RATES[$from][$to] ?? 0;

        return $amount * $rate;
    }
}