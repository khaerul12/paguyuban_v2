<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetsResource\Pages;
use App\Filament\Resources\AssetsResource\RelationManagers;
use App\Models\Assets;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetsResource extends Resource
{
    protected static ?string $model = Assets::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = "Keuangan";

    protected static ?string $pluralModelLabel = 'Daftar Keuangan';
    protected static ?string $label = 'Keuangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add dan Edit Keuangan')->schema([
                    DatePicker::make('date')->label('Tanggal')
                        ->displayFormat('d-F-Y')
                        ->native(false)
                        ->required(),
                    TextInput::make('description')->label('Keterangan')->required(),
                    TextInput::make('amount')->label('Nominal')
                        ->numeric()
                        ->inputMode('decimal'),
                    Radio::make('payment')->label('Debit atau Kredit')
                        ->options([
                            'Debit' => 'Debit',
                            'Kredit' => 'Kredit'
                        ]),
                    Select::make('category')->label('Kategori')
                        ->options([
                            'crypto' => 'Crypto',
                            'investing' => 'Investing',
                            'broker' => 'Broker',
                        ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Tanggal')->date('d-F-Y')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('amount')->money('IDR'),
                TextColumn::make('payment')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetCustom::route('/'),
            'create' => Pages\CreateAssets::route('/create'),
            'edit' => Pages\EditAssets::route('/{record}/edit'),
        ];
    }
}
