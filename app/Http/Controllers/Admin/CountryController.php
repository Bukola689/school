<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Resources\CountryResource;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('created_at', 'DESC')->get();

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
       //dd($request->all());
        $country = new Country;
        $country->name = $request->input('name');
        $country->save();

        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
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
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->name = $request->input('name');
        $country->update();

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\COuntry  $cOuntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country = $country->delete();

        return response()->json([
            'status' => 'Country Deleted Successfully !'
        ]);
    }
}
