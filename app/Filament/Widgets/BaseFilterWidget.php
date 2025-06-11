<?php

namespace App\Filament\Widgets;

use App\Helpers\FilterOptions;
use Filament\Widgets\ChartWidget;

abstract class BaseFilterWidget extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?string $maxHeight = '350px';
    protected static ?string $pollingInterval = '60s';
    public ?string $filter = '12h';

    protected function getFilters(): ?array
    {
        return FilterOptions::TIME_RANGES;
    }
}
