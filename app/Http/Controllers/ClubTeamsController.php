<?php

namespace App\Http\Controllers;

use App\Models\ClubTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\CountriesName;
use App\Providers\RouteServiceProvider;
use App\Http\Service\GetCountryService;
use App\Models\Players\JapanesePlayer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class ClubTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubTeams = ClubTeam::select('club_team_id', 'country_id', 'club_team_name')->paginate(5);
        return view("ClubTeam.index", compact('clubTeams'));
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
    public function show(ClubTeam $clubTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClubTeam $clubTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClubTeam $clubTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClubTeam $clubTeam)
    {
        //
    }
}
