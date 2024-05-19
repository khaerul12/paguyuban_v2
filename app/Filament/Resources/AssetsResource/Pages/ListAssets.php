<?php

namespace App\Filament\Resources\AssetsResource\Pages;

use App\Filament\Resources\AssetsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\ExpensesDebitChart;
use App\Filament\Widgets\IncomesDebitChart;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListAssets extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = AssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            // ExpensesDebitChart::class,
            // IncomesDebitChart::class
        ];
    }    
}

