<?php

namespace App\Http\Controllers;

use App\Models\ClubTeam;
use App\Http\Controllers\Controller;
use App\Http\Service\ClubTeamPlayerService;
use Illuminate\Http\Request;

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
    public function search(Request $request, $clubTeamId)
    {
        if (isset($request) && $request->reset && isset($clubTeamId)) {
            $request = new Request();
        }

        $players = [];
        $searchPlayersService = new ClubTeamPlayerService();
        $players = $searchPlayersService->searchPlayers($request, $clubTeamId);

        return view("clubteam.show", compact('players', 'clubTeamId'));
    }

    /**
     * 選手一覧ページ
     * indexPageにて、クラブチームを押下=>club_team_idを渡す
     * club_team_idを使って各国の選手テーブルと照らし合わせていく
     */
    public function show(int $clubTeamId)
    {
        $getPlayersService = new ClubTeamPlayerService();
        $players = $getPlayersService->getPlayers($clubTeamId);

        return view("clubteam.show", compact('players', 'clubTeamId'));
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
