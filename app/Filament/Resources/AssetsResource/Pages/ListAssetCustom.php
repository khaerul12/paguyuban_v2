<?php

namespace App\Filament\Resources\AssetsResource\Pages;

use App\Filament\Resources\AssetsResource;
use App\Models\Assets;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Support\Assets\Asset;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;


class ListAssetCustom extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "List";

    protected ?string $heading = "Daftar Keuangan";


    protected static string $resource = AssetsResource::class;


    protected static string $view = 'filament.resources.assets-resource.pages.list-asset-custom';

    protected function getViewData(): array
    {
        $debit = Assets::where('payment', 'Debit')->sum('amount');
        $kredit = Assets::where('payment', 'Kredit')->sum('amount');

        $total = $kredit - $debit;
        return [
            'total' => number_format($total, 2, ',', '.')
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Assets::query())
            ->columns([
                TextColumn::make('date')->label('Tanggal')->date('d-F-Y')->searchable(),
                TextColumn::make('description')->label('Keterangan')->searchable(),
                TextColumn::make('amount')->money('IDR'),
                TextColumn::make('payment')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')
                    ->action(function (Assets $record) {
                        return redirect()->to('admin/assets/' . $record->id . '/edit');
                    }),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('date')->heading('Tanggal'),
                            Column::make('description')->heading('Keterangan'),
                            Column::make('amount')->heading('Total'),
                            Column::make('payment')->heading('Payment'), Column::make('category')->heading('Kategori'),
                        ]),
                    ]),
                    DeleteBulkAction::make()
                ])
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Keuangan')
                    ->color('success')
                    ->action(function () {
                        return redirect()->to('admin/assets/create');
                    })
            ]);
    }




    public static function getPages(): array
    {
        return [
            'create' => CreateAssets::route('/create'),
            'edit' => EditAssets::route('/{record}/edit'),
        ];
    }

    // public function render(): View
    // {
    //     return view('livewire.list-products');
    // }
}
