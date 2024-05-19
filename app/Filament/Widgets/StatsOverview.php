<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use App\Filament\Resources\OrderResource\Pages\ListAssets;
use App\Models\Assets;


class StatsOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListAssets::class;
    }
    protected function getStats(): array
    {

        // $debit = Assets::where('payment', 'Debit')->sum('amount'); //debit pengeluaran
        // $kredit = Assets::where('payment', 'Kredit')->sum('amount'); //kredit pemasukan
        // $total = $kredit - $debit;

        $debit = Assets::where('payment', 'Debit')->sum('amount'); //debit pengeluaran
        $kredit = Assets::where('payment', 'Kredit')->sum('amount'); //kredit pemasukan
        $total = $kredit - $debit;
        

        $formattedDebit = number_format($debit, 2, ',', '.');
        $formattedKredit = number_format($kredit, 2, ',', '.');
        $formattedTotal = number_format($total, 2, ',', '.');
        return [
            Stat::make('Pemasukan', $formattedKredit),
            Stat::make('Pengeluaran', $formattedDebit),
            Stat::make('Selisih', $formattedTotal),
        ];
    }
}
