<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiodataResource\Pages;
use App\Filament\Resources\BiodataResource\RelationManagers;
use App\Models\Address;
use App\Models\Biodata;
use App\Models\City;
use App\Models\Province;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Ramsey\Uuid\Type\Integer;

class BiodataResource extends Resource
{
    protected static ?string $model = Biodata::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = "Kepala Keluarga";

    protected static ?string $pluralModelLabel = 'Daftar Kepala Keluarga';
    protected static ?string $label = 'Kepala Keluarga';


    protected static ?string $slug = 'daftar-kepala-keluarga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Pribadi')->schema([
                    Section::make()->schema([
                        TextInput::make('kk')->label('No. KK')->numeric()->required(),
                        TextInput::make('nik')->label('NIK')->numeric()->required(),
                        TextInput::make('full_name')->name('Nama Lengkap')->required(),
                        Forms\Components\Grid::make(2)->schema([
                            Select::make('gender')->name('Jenis Kelamin')->required()
                                ->options([
                                    'laki-laki' => 'Laki-Laki',
                                    'perempuan' => 'Perempuan',
                                ])->native(false),
                            TextInput::make('blood')->name('Golongan Darah'),
                        ]),
                        Select::make('religion')->name('Agama')->required()
                            ->options([
                                'islam' => 'Islam',
                                'protestan' => 'Protestan',
                                'katolik' => 'Katolik',
                                'buddha' => 'Buddha',
                                'khonghucu' => 'Khonghucu',
                            ])->native(false),
                        Select::make('status')->name('Status Pernikahan')->required()
                            ->options([
                                'balum kawain' => 'Belum Kawin',
                                'kawin' => 'Kawin'
                            ])->native(false),
                        TextInput::make('profession')->name('Pekerjaan')->required(),
                        Textarea::make('note')->name('Catatan'),
                    ])->columnSpan(8),
                    Section::make()->schema([
                        FileUpload::make('image')
                            ->image()->name('Upload Foto Kamu')->required(),
                        DatePicker::make('birth_date')
                            ->displayFormat('d-F-Y')
                            ->native(false)
                            ->required(),
                        Radio::make('condition')->label('Kondisi')
                            ->options([
                                'Sejahtera' => 'Sejahtera',
                                'Pra Sejahtera' => 'Pra Sejahtera'
                            ])
                    ])->columnSpan(4),
                ])->columns(12),


                Section::make('Alamat Asal')->relationship('address')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Select::make('city_id')
                                ->relationship('Kota', 'name')
                                ->searchable()
                                ->required(),
                            Select::make('province_id')
                                ->relationship('Provinsi', 'name')
                                ->searchable()
                                ->required(),
                        ]),
                    ]),
                Section::make('Alamat Sekarang')->relationship('address')
                    ->schema([
                    TextInput::make('Alamat')->required(),
                    TextInput::make('Keluarahan')->required(),
                    TextInput::make('Kecamatan')->required(),
                ]),

                Section::make('Pendidikan')->relationship('education')
                    ->schema([
                        TextInput::make('sd')->label('SD'),
                        TextInput::make('smp')->label('SMP'),
                        TextInput::make('smk')->label('SMK'),
                        TextInput::make('college')->label('Kuliah'),
                    ]),

                Section::make('Kontak Person')->schema([
                    TextInput::make('numbers')->numeric()->maxLength(12)->required(),
                    TextInput::make('email')->email(),
                    TextInput::make('facebook'),
                    TextInput::make('instagram'),
                    TextInput::make('twitter'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Foto'),
                TextColumn::make('kk')->label('No. KK')->searchable(),
                Tables\Columns\TextColumn::make('nik')->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')->label('Tanggal Lahir')
                    ->date('d-F-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address.city.name')->label('Kota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address.province.name')->label('Provinsi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()->before(function ($record) {
                    self::beforDelete($record);
                })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->withColumns([
                            Column::make('kk')->heading('kk'),
                            Column::make('nik')->heading('NIK'),
                            Column::make('full_name')->heading('Nama'),
                            Column::make('image')->heading('Foto'),
                            Column::make('birth_date')->heading('Tanggal Lahir'),
                            Column::make('gender')->heading('Jenis Kelamin'),
                            Column::make('blood')->heading('Golongan Darah'),
                            Column::make('religion')->heading('Agama'),
                            Column::make('status')->heading('Status'),
                            Column::make('profession')->heading('Profesi'),
                            Column::make('note')->heading('Catatan'),
                            Column::make('numbers')->heading('Nomor HP'),
                            Column::make('email')->heading('Email'),
                            Column::make('facebook')->heading('Facebook'),
                            Column::make('instagram')->heading('Instagram'),
                            Column::make('twitter')->heading('Twitter'),
                            Column::make('address.street')->heading('Alamat'),
                            Column::make('address.city.name')->heading('Kota'),
                            Column::make('address.province.name')->heading('Provinsi'),
                            Column::make('address.sub_district')->heading('Kecamatan'),
                            Column::make('education.sd')->heading('SD'),
                            Column::make('education.smp')->heading('SMP'),
                            Column::make('education.sma')->heading('SMA'),
                            Column::make('education.college')->heading('Kuliah'),
                        ]),
                    ]),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->label('Tambah Kepala Keluarga'),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function beforDelete($record): void
    {
        $address = Address::where('biodata_id', $record->id)->get();
        $city = City::find($address[0]['city_id']);
        $city->count = $city->count - 1;
        $city->update();

        $province = Province::find($address[0]['province_id']);
        $province->count = $province->count - 1;
        $province->update();
        //        dd($address);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBiodatas::route('/'),
            'create' => Pages\CreateBiodata::route('/create'),
            'edit' => Pages\EditBiodata::route('/{record}/edit'),
        ];
    }
}
