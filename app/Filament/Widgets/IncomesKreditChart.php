<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Assets;

class IncomesKreditChart extends ChartWidget
{
    protected static ?string $heading = 'Pemasukan';

    protected function getData(): array
    {
        // versi 1
        // $data = Trend::model(Assets::class)
        // ->between(
        //     start: now()->startOfYear(),
        //     end: now()->endOfYear(),
        // )
        // ->perMonth()
        // ->sum('amount');

        //versi 2
        $data = Trend::query(Assets::where('payment','Kredit'))
        ->dateColumn('transaction_date')
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->sum('amount');

        
 
    return [
        'datasets' => [
            [
                'label' => 'Pemasukan',
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
