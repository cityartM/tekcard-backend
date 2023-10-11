<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
/*use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;*/
use Webpatser\Countries\CountriesFacade as Countries;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('countries')->truncate();
        /*$countries = [
            [
                'name' => json_encode(['en' => 'Algeria', 'fr' => 'Algerie', 'ar' => 'الجزائر']),
                'code' => 'US',
                'lat' => 37.0902,
                'lon' => -95.7129,
            ],
            [
                'name' => json_encode(['en' => 'United States', 'fr' => 'États-Unis', 'ar' => 'الولايات المتحدة']),
                'code' => 'US',
                'lat' => 37.0902,
                'lon' => -95.7129,
            ],
            [
                'name' => json_encode(['en' => 'Canada', 'fr' => 'Canada', 'ar' => 'الولايات المتحدة']),
                'code' => 'CA',
                'lat' => 56.1304,
                'lon' => -106.3468,
            ],
            // Add more countries as needed
        ];

        // Insert the data into the "countries" table
        DB::table('countries')->insert($countries);*/


        //Get all of the countries
        $countries = Countries::getList();
        foreach ($countries as $countryId => $country) {
            DB::table('countries')->insert(array(
                'id' => $countryId,
                'capital' => ((isset($country['capital'])) ? $country['capital'] : null),
                'citizenship' => ((isset($country['citizenship'])) ? $country['citizenship'] : null),
                'country_code' => $country['country-code'],
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'currency_sub_unit' => ((isset($country['currency_sub_unit'])) ? $country['currency_sub_unit'] : null),
                'full_name' => ((isset($country['full_name'])) ? $country['full_name'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'name' => $country['name'],
                'region_code' => $country['region-code'],
                'sub_region_code' => $country['sub-region-code'],
                'eea' => (bool)$country['eea'],
                'calling_code' => $country['calling_code'],
                'currency_symbol' => ((isset($country['currency_symbol'])) ? $country['currency_symbol'] : null),
                'flag' =>((isset($country['flag'])) ? $country['flag'] : null),
            ));
        }

    }
}
