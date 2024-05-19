<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Kegiatan";

    protected static ?string $pluralModelLabel = 'Daftar Kegiatan';
    protected static ?string $label = 'Kegiatan';


    protected static ?string $slug = 'daftar-kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add dan Edit Posting Kegiatan')->schema([
                    Section::make()->schema([
                        TextInput::make('title')->label('Judul Kegiatan')->required(),
                        RichEditor::make('body')->label('Isi Konten')->required(),
                    ])->columnSpan(8),
                    Section::make()->schema([
                        FileUpload::make('image')->label('Upload Foto')->required(),
                        DatePicker::make('create_at')->label("Tanggal konten")
                            ->displayFormat('d-F-Y')
                            ->native(false)
                            ->required(),
                        // Select::make('category')->label('Kategori')
                        //     ->options([
                        //         'crypto' => 'Crypto',
                        //         'investing' => 'Investing',
                        //         'broker' => 'Broker',
                        //     ])
                        //     ->native(false)->required(),

                        Toggle::make('active')->label('Published')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-user')
                            ->onColor('success')
                    ])->columnSpan(4),
                ])->columns(12)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto'),
                TextColumn::make('title')->label('Judul Kegiatan')->searchable(),
                Tables\Columns\TextColumn::make('create_at')->label('Tanggal Publish')
                    ->date('d-F-Y')
                    ->searchable(),
                // TextColumn::make('category')->label('Kategori'),
                IconColumn::make('active')->label('Published')->boolean()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->label("Tambah Kegiatan"),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
