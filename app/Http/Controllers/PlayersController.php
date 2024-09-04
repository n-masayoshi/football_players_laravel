<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Service\GetCountryService;
use App\Models\ClubTeam;
use App\Http\Service\StorePlayersService;
use App\Http\Service\RedirectRouteService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($countryId)
    {
        $getCountry = new GetCountryService();
        $country = $getCountry->getCountryNameAndModel($countryId);

        // 国名が 空 ならアラートを表示する
        if ($country[0] == "") {
            return redirect('/countries')
                ->with([
                    'message' => 'データが存在しません。',
                    'status' => 'alert'
                ]);
        }
        $players = $country[1];

        // クラブチームのデータを取得
        $clubTeams = ClubTeam::all();

        return view("players.{$country[0]}.index", compact('players', 'clubTeams', 'countryId'));
    }

    /**
     * 検索機能
     */
    public function search(Request $request) {}

    /**
     * Show the form for creating a new resource.
     * 選手登録ページを表示する。
     */
    public function create(int $country_id)
    {
        // クラブチームのデータを取得
        $clubTeams = ClubTeam::select('club_team_id', 'club_team_name')->get();

        return view("players.create", compact('country_id', 'clubTeams'));
    }

    /**
     * Store a newly created resource in storage.
     * 選手を登録する
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'player_name' => 'required|string',
                'player_age' => 'required',
                'club_team_id' => 'required',
            ]);
        } catch (Exception $e) {
            Log::debug($e);
            throw $e;
        }

        DB::beginTransaction();
        try {
            // クラブチーム名を取得
            $clubTeamName = DB::table('m_club_teams')->where('club_team_id', $request->club_team_id)->value('club_team_name');

            $storePlayers = new StorePlayersService();
            $storePlayers->storePlayers($request, $clubTeamName);
            DB::commit();
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect()->back()->with('error', '選手の登録に失敗しました。')->withInput();
        }

        // リダイレクト先のURLを取得
        $redirectRouteService = new RedirectRouteService();
        $redirectRoute = $redirectRouteService->getRedirectRouteService($request->country_id);
        return redirect($redirectRoute);
    }

    /**
     * Display the specified resource.
     */
    public function show(Players $players)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Players $players)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Players $players)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Players $players)
    {
        //
    }
}
