<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Constants\CountriesName;
use App\Providers\RouteServiceProvider;
use App\Http\Service\GetCountryService;
use App\Models\Players\JapanesePlayer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Carbon\Carbon;
use Exception;
use PhpParser\Node\Expr\Empty_;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(int $country_id)

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
        return view("Players.{$country[0]}.index", compact('players'));
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
        if ($request->club_team_name && $request->club_team_name != '') {
            $players_query->where('club_team_name', 'LIKE', '%' . $request->club_team_name . '%');
        }

        $players = $players_query->get();
        return view("Players.Japan.index", compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $country_id)
    {
        return view("Players.Japan.create", ['country_id' => $country_id]);
    }

    /**
     * Store a newly created resource in storage.
     * 日本人選手を登録する
     */
    public function store(Request $request, int $country_id)
    {
        try {
            $request->validate([
                // 'country_id' => ['required', 'integer'],
                'player_name' => ['required', 'string'],
                'player_age' => ['required', 'integer'],
                'club_team_id' => ['required', 'integer'],
                'club_team_name' => ['required', 'string'],
            ]);
        } catch (Exception $e) {
            Log::debug($e);
            throw $e;
        }

        DB::beginTransaction();
        try {
            $japanesePlayers = JapanesePlayer::create([
                'country_id' => $country_id,
                'player_name' => $request->player_name,
                'player_age' => $request->player_age,
                'club_team_id' => $request->club_team_id,
                'club_team_name' => $request->club_team_name,
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
