<?php

namespace App\Filament\Resources\Anggota\BiodataResource\Pages;

use App\Filament\Resources\Anggota\BiodataResource;
use App\Models\Biodata;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;


class CreateBiodata extends CreateRecord
{
    protected static string $resource = BiodataResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $data = $this->record;
        $bio = Biodata::where('kk', $data['kk'])->get();

        $data->head_kk = $bio[0]['id'];
        $data->update();
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->color('success')
            ->label('Simpan')
            ->icon('heroicon-o-check'); // TODO: Change the autogenerated stub
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Kembali'); // TODO: Change the autogenerated stub
    }
}