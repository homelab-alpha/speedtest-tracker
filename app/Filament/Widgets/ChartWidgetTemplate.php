<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

abstract class ChartWidgetTemplate extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?string $maxHeight = '350px';
    protected static ?string $pollingInterval = '60s';
    public ?string $filter = '24h';

    public const TIME_RANGES = [
        '15m'   => 'Last 15 minutes',
        '30m'   => 'Last 30 minutes',
        '1h'    => 'Last hour',
        '3h'    => 'Last 3 hours',
        '6h'    => 'Last 6 hours',
        '12h'   => 'Last 12 hours',
        '24h'   => 'Last 24 hours',
        'week'  => 'Last week',
        'month' => 'Last month',
    ];

    protected function getFilters(): ?array
    {
        return static::TIME_RANGES;
    }

    public static function getStartDate(?string $filter): ?\Carbon\Carbon
    {
        return match ($filter) {
            '15m'   => now()->subMinutes(15),
            '30m'   => now()->subMinutes(30),
            '1h'    => now()->subHour(),
            '3h'    => now()->subHours(3),
            '6h'    => now()->subHours(6),
            '12h'   => now()->subHours(12),
            '24h'   => now()->subDay(),
            'week'  => now()->subWeek(),
            'month' => now()->subMonth(),
            default => null,
        };
    }
}
