<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Service\GetCountryService;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $countries = Country::select('country_id', 'country_name')->paginate(5);

        // 検索フォーム用
        $allCountries = Country::all();
        return view("Country.index", compact('countries', 'allCountries'));
    }

    /**
     * 検索機能
     */
    public function search(Request $request)
    {
        if (isset($request) && $request->reset) {
            $request = new Request();
        }

        $request->validate([
            'country_id' => 'required'
        ]);

        $countries = [];
        $countries_query = Country::query(); // クエリビルダ

        /**
         * クラブチーム
         */
        if ($request->country_id && $request->country_id != '') {
            $countries_query->where('country_id', $request->country_id);
        }

        // 選手データ取得
        $countries = $countries_query->paginate(5);

        // 検索フォーム用
        $allCountries = Country::all();

        return view("country.index", compact('countries', 'allCountries'));
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

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
