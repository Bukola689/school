<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Http\Resources\CountryResource;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Repository\Admin\CountryRepository;

class CountryController extends Controller
{
    public $country;

    public function __construct(CountryRepository $country)
    {
        $this->country = $country;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = cache()->rememberForever('country:all', function () {
            Country::orderBy('created_at', 'DESC')->get();
        });

        if($countries->isEmpty()) {
            return response()->json('Country Is Empty');
        }

        return CountryResource::collection($countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCOuntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
       $data = $request->all();

       $this->country->saveCountry($request, $data);

       cache()->forget('country:all');

        return response()->json([
            'message' => 'Country Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);

        if(! $country) {
            return response()->json('Country Not Found');
        }

        $countryShow = cache()->rememberForever('country:'. $country->id, function () use($country) {
            return $country;
        });

        return new CountryResource($countryShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCOuntryRequest  $request
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $country = Country::find($id);

        if(! $country) {
            return response()->json('Country Not Found');
        }

        $data = $request->all();

        $this->country->updateCountry($request, $country, $data);

        cache()->forget('country:'. $country->id);
        cache()->forget('country:all');
 
         return response()->json([
             'message' => 'Country Updated Successfully'
         ]);

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);

        if(! $country) {
            return response()->json('CountryNot Found');
        }

        $this->country->removeCountry($country);

        cache()->forget('country:'. $country->id);
        cache()->forget('country:all');

        return response()->json([
            'status' => 'Country Deleted Successfully !'
        ]);
    }
}
