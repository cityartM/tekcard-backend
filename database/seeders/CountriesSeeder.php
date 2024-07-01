<?php

namespace Database\Seeders;


use App\Helper\Helper;
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
        //Get all of the countries
        $countries = Countries::getList();
        foreach ($countries as $countryId => $country) {
            $ar = Helper::translate('ar',$country['name']);
            // sleep(1);
            $fr = Helper::translate('fr',$country['name']);
            DB::table('countries')->insert(array(
                'id' => $countryId,
                'display' => (($country['name'] == 'Algeria' || $country['name'] =='Turkey' || $country['name'] == 'Tunisia')? 1:0),
                'capital' => ((isset($country['capital'])) ? $country['capital'] : null),
                'citizenship' => ((isset($country['citizenship'])) ? $country['citizenship'] : null),
                'country_code' => $country['country-code'],
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'currency_sub_unit' => ((isset($country['currency_sub_unit'])) ? $country['currency_sub_unit'] : null),
                'full_name' => ((isset($country['full_name'])) ? $country['full_name'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'name' => json_encode([
                    'en' => $country['name'],
                    'ar' => $ar,
                    'fr' => $fr,
                ]),
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
