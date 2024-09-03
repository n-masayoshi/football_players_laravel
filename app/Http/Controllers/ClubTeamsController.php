<?php

namespace App\Http\Controllers;

use App\Models\ClubTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClubTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubTeams = ClubTeam::select('club_team_id', 'club_team_id', 'club_team_name')->paginate(5);

        // 検索フォーム用
        $allClubTeams = ClubTeam::all();
        return view("clubteam.index", compact('clubTeams', 'allClubTeams'));
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
            'club_team_id' => 'required'
        ]);

        $clubTeams = [];
        $clubTeams_query = ClubTeam::query(); // クエリビルダ

        /**
         * クラブチーム
         */
        if ($request->club_team_id && $request->club_team_id != '') {
            $clubTeams_query->where('club_team_id', $request->club_team_id);
        }

        // 選手データ取得
        $clubTeams = $clubTeams_query->paginate(5);

        // 検索フォーム用
        $allClubTeams = ClubTeam::all();

        return view("clubteam.index", compact('clubTeams', 'allClubTeams'));
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
