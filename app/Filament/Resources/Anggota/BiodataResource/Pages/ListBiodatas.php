<?php

namespace App\Filament\Resources\Anggota\BiodataResource\Pages;

use App\Filament\Resources\Anggota\BiodataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ListBiodatas extends ListRecords
{
    protected static string $resource = BiodataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Anggota Keluarga'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->whereNotNull('head_kk');
    }
}
