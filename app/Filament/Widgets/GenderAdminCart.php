<?php

namespace App\Filament\Widgets;

use App\Models\Biodata;
use Filament\Widgets\ChartWidget;

class GenderAdminCart extends ChartWidget
{
    protected static ?string $heading = 'Gender';
    protected static ?string $maxHeight = '275px';


    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Gender',
                    'data' => self::getGender(),
                    'backgroundColor' => ['#36A2EB','#9BD0F5']
                ],
            ],
            'labels' => ['laki-laki','perempuan'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    public static function getGender():array{
        $laki = Biodata::where('gender','laki-laki')->count();
        $perempuan = Biodata::where('gender','perempuan')->count();
        $data = array();
        array_push($data,$laki);
        array_push($data,$perempuan);
        return $data;
    }
}
