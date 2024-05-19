<?php

namespace App\Filament\Widgets;

use App\Models\City;
use Filament\Widgets\ChartWidget;

class CityAdminCart extends ChartWidget
{
    protected static ?string $heading = 'Top 10 By City';
    protected static ?string $maxHeight = '600px';


    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Top City',
                    'data' => self::top10Count(),
                    'backgroundColor' => self::generate10Color(),
                    'borderColor' => 'rgba(255, 99, 71, 0.2)',
                ],
            ],
            'labels' => self::top10Label(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public static function top10Count(): array
    {
        $cities = City::take(10)->orderBy('count', 'desc')->get();
        $count = array();
        foreach ($cities as $city) {
            array_push($count, $city->count);
//            dd($city);
        }
        return $count;
    }

    public static function top10Label(): array
    {
        $cities = City::take(10)->orderBy('count', 'desc')->get();
        $label = array();
        foreach ($cities as $city) {
            $city = explode(" ",$city->name);
            $name = '';
            for ($i = 1; $i < count($city); $i++) {
                $name .= ' '.$city[$i];
            }
            array_push($label, $name);
        }
        return $label;
    }

    public static function random_color_part(): string
    {
        return (mt_rand(0, 255));
    }

    public static function random_color(): string
    {
        return self::random_color_part() . ',' . self::random_color_part() . ',' . self::random_color_part();
    }

    public static function generate10Color(): array
    {
        $color = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($color,
                'rgba(' . self::random_color() . ','. round((mt_rand() / mt_getrandmax()),1) .')'
            );
        }
        return $color;
    }
}
