<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
 
class Filters extends Widget implements HasForms
{
    use InteractsWithForms;
 
    protected static string $view = 'filament.widgets.filters';
 
    protected int | string | array $columnSpan = 'full';
 
    protected static ?int $sort = 1;
 
    public ?array $data = [];
 
    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                        DatePicker::make('from'),
                        DatePicker::make('to'),
            ]);
    }
}