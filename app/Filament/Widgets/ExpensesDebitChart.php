<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Assets;

class ExpensesDebitChart extends ChartWidget
{
    protected static ?string $heading = 'Pengeluaran';

    protected function getData(): array
    {
        $data = Trend::model(Assets::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perDay()
        ->sum('amount');
        
 
    return [
        'datasets' => [
            [
                'label' => 'pengeluaran',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
