<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;

class CountryCommand extends Command
{
    protected $signature = 'country:create';
    protected $description = 'Create country table';

    public function handle()
    {
        $countryJson = file_get_contents(base_path('jsons/country.json'));
        $countries = json_decode($countryJson, true);

        foreach ($countries as $country) {
            $country['currency_code'] = strtoupper($country['currency_code']);
            Country::create($country);
        }

        $countriesDetailsJson = file_get_contents(base_path('jsons/country1.json'));
        $countriesDetails = json_decode($countriesDetailsJson, true);

        foreach ($countriesDetails as $countryDetail) {
            $detailsData = [
                'currency_dial_code' => $countryDetail['phone'][0] ?? NULL,
                'currency_dial_code_length' => $countryDetail['phoneLength'] ?? NULL,
                'timezones' => isset($countryDetail['timezones']) ? json_encode($countryDetail['timezones']) : NULL,
                'iso' => isset($countryDetail['iso']) ? json_encode($countryDetail['iso']) : NULL,
                'flag' => $countryDetail['image'] ?? NULL,
                'emoji' => $countryDetail['emoji'] ?? NULL
            ];
            $currencyCode = strtoupper($countryDetail['iso']['alpha-2']);
            Country::where(['country_code' => $currencyCode])->update($detailsData);
        }

        $this->info('Countries data inserted successfully.');
    }
}
