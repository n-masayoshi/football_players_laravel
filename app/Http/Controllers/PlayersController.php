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
use Illuminate\View\View;
use Carbon\Carbon;
use Exception;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $country_id)
    {
        // TODO: 7/28現在、日本人選手以外データがないので。
        if ($country_id != CountriesName::JAPAN) {
            return redirect('/countries')
                ->with([
                    'message' => 'データが存在しません。',
                    'status' => 'alert'
                ]);
        }

        $getCountryName = new GetCountryService();
        $country = $getCountryName->getCountryNameAndModel($country_id);


        return view("Players.{$country[0]}.index", ['players' => $country[1]]);

        // $japanesePlayers = JapanesePlayer::all();
        // return view("Players.Japan.index", compact('japanesePlayers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Players.Japan.create");
    }

    /**
     * Store a newly created resource in storage.
     * 日本人選手を登録する
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => ['required', 'integer'],
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
                'country_id' => $request->country_id,
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
