<?php

namespace App\Filament\Widgets;

use App\Models\Biodata;
use App\Models\City;
use App\Models\Province;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BiodataStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Data Anggota', Biodata::whereNotNull('condition')->count()),
            Stat::make('Total Kota', City::where('count', '<>', 0)->count()),
            Stat::make('Total Province', Province::where('count', '<>', 0)->count()),
            Stat::make('', ''),
        ];
    }
}
