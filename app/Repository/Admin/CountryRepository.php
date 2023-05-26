<?php

namespace App\Repository\Admin;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryRepository implements ICountryRepository
{
    public function saveCountry(Request $request, array $data)
    {
        $country = new Country;
        $country->name = $request->input('name');
        $country->save();
    }

     public function updateCountry(Request $request, Country $country, array $data)
     {
        $country->name = $request->input('name');
        $country->update();
     }

     public function removeCountry(Country $country)
     {
        $country = $country->delete();
     }
}