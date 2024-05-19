<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Seeds\CsvtoArray;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $jsonProvince = Storage::json('/json/province.json');
        foreach ($jsonProvince as $data) {
            Province::create($data);
        }

        $jsonCities = Storage::json('/json/cities.json');
        foreach ($jsonCities as $data) {
            City::create($data);
        }


    }
}
