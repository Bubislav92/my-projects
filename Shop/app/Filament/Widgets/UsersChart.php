<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'New Users Over Time';

    protected static ?string $pollingInterval = '60s'; // opcionalno, produženo osvežavanje

    protected function getType(): string
    {
        return 'line'; // ili 'bar' ako ti više odgovara
    }

    protected function getFilters(): ?array
    {
        return [
            '1_month' => '1 Month',
            '3_months' => '3 Months',
            '6_months' => '6 Months',
            '12_months' => '12 Months',
        ];
    }

    protected function getDefaultFilter(): ?string
    {
        return '3_months';
    }

    protected function getData(): array
    {
        $filter = $this->filter;

        $end = now();
        $start = match ($filter) {
            '1_month' => now()->subMonth(),
            '3_months' => now()->subMonths(3),
            '6_months' => now()->subMonths(6),
            default => now()->subYear(),
        };

        $data = Trend::model(User::class)
            ->between(start: $start, end: $end)
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'New Users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) =>
                Carbon::parse($value->date)->format('M Y')
            ),
        ];
    }
}
