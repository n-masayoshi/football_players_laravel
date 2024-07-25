<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Services\GetCountryService;
use Illuminate\View\View;
use App\Models\Players;


class EachCountriesPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($country_id): View
    {
        // $country_idを使って、どの国かを判別するメソッドを書く。
        $country_service = new GetCountryService();
        $country_name = $country_service->getCountryName($country_id);

        dd($country_name);

        return view("Players.{$country_name}.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
