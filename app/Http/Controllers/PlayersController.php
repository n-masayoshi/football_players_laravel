<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Constants\CountriesName;
use App\Providers\RouteServiceProvider;
use App\Http\Service\GetCountryService;
use App\Models\Players\JapanesePlayer;
use App\Models\ClubTeam;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $country_id)
    {
        // TODO: 現状、日本以外をクリックしたら、はじく制御になっている。
        if ($country_id != CountriesName::JAPAN) {
            return redirect('/countries')
                ->with([
                    'message' => 'データが存在しません。',
                    'status' => 'alert'
                ]);
        }
        $getCountry = new GetCountryService();
        $country = $getCountry->getCountryNameAndModel($country_id);
        $players = $country[1];

        // クラブチームのデータを取得
        $clubTeams = ClubTeam::select('club_team_id', 'club_team_name')->get();

        return view("Players.{$country[0]}.index", compact('players', 'clubTeams'));
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
            // ひらがな、カタカナ、漢字、英字は許可
            'player_name' => ['nullable', 'string', 'regex:/^[ぁ-んァ-ヶ一-龠a-zA-Zー\s]+$/u'],
            'club_team_name' => ['nullable', 'string', 'regex:/^[ぁ-んー　]+$/u'],
        ]);

        $players = [];
        $players_query = JapanesePlayer::query(); // クエリビルダ

        /**
         * 選手名
         */
        if ($request->player_name && $request->player_name != '') {
            $players_query->where('player_name', 'LIKE', '%' . $request->player_name . '%');
        }

        /**
         * 年齢
         */
        if ($request->player_age && $request->player_age != '') {
            $players_query->where('player_age', $request->player_age);
        }

        /**
         * クラブチーム
         */
        if ($request->club_team_id && $request->club_team_id != '') {
            $players_query->where('club_team_id', $request->club_team_id);
        }
        // 選手データ取得
        $players = $players_query->get();

        // クラブチームのデータを取得
        $clubTeams = ClubTeam::select('club_team_id', 'club_team_name')->get();

        return view("Players.Japan.index", compact('players', 'clubTeams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $country_id)
    {
        // クラブチームのデータを取得
        $clubTeams = ClubTeam::select('club_team_id', 'club_team_name')->get();

        return view("Players.Japan.create", [
            'country_id' => $country_id,
            'clubTeams' => $clubTeams
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 日本人選手を登録する
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

            $japanesePlayers = JapanesePlayer::create([
                'country_id' => $request->country_id,
                'player_name' => $request->player_name,
                'player_age' => $request->player_age,
                'club_team_id' => $request->club_team_id,
                'club_team_name' => $clubTeamName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect()->back()->with('error', 'データの保存に失敗しました。')->withInput();
        }

        event(new Registered($japanesePlayers));

        return redirect(RouteServiceProvider::JAPANESE_PLAYERS_INDEX);
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
