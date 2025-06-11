<?php

namespace App\Helpers;

class FilterOptions
{
    public const TIME_RANGES = [
        '1h'   => 'Last hour',
        '12h'  => 'Last 12h',
        '24h'  => 'Last 24h',
        'week' => 'Last week',
        'month'=> 'Last month',
    ];

    public static function getStartDate(?string $filter): ?\Carbon\Carbon
    {
        return match ($filter) {
            '1h'   => now()->subHour(),
            '12h'  => now()->subHours(12),
            '24h'  => now()->subDay(),
            'week' => now()->subWeek(),
            'month'=> now()->subMonth(),
            default => null,
        };
    }
}
