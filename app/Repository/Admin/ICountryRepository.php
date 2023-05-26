<?php

namespace App\Repository\Admin;

use App\Models\Country;
use Illuminate\Http\Request;

interface ICountryRepository
{
    public function saveCountry(Request $request, array $data);

     public function updateCountry(Request $request, Country $country, array $data);

     public function removeCountry(Country $country);
}