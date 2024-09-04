<?php

namespace App\Http\Service;

use App\Models\Players\JapanesePlayer;
use App\Models\Players\EnglandPlayer;
use App\Models\Players\SpainPlayer;
use App\Models\Players\BrazilPlayer;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

/**
 * $country_idを使って、国を判別して選手登録する
 * */
class StorePlayersService
{
    public function storePlayers($request, $clubTeamName)
    {
        try {
            switch ($request->country_id) {
                case 1:
                    $players = JapanesePlayer::create([
                        'country_id' => $request->country_id,
                        'player_name' => $request->player_name,
                        'player_age' => $request->player_age,
                        'club_team_id' => $request->club_team_id,
                        'club_team_name' => $clubTeamName,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    break;
                case 2:
                    break;
                case 3:
                    $players = BrazilPlayer::create([
                        'country_id' => $request->country_id,
                        'player_name' => $request->player_name,
                        'player_age' => $request->player_age,
                        'club_team_id' => $request->club_team_id,
                        'club_team_name' => $clubTeamName,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    break;
                case 4:
                    // $country_name = "france";
                    // $players = FrancePlayer::all();
                    break;
                case 5:
                    // $country_name = "netherland";
                    // $players = NetherlandPlayer::all();
                    break;
                case 6:
                    // $country_name = "korea";
                    // $players = KoreaPlayer::all();
                    break;
                case 7:
                    // $country_name = "switzerland";
                    // $players = SwitzerlandPlayer::all();
                    break;
                case 8:
                    $players = EnglandPlayer::create([
                        'country_id' => $request->country_id,
                        'player_name' => $request->player_name,
                        'player_age' => $request->player_age,
                        'club_team_id' => $request->club_team_id,
                        'club_team_name' => $clubTeamName,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    break;
                default:
                    break;
            }
            // DBへの登録処理を実行
            event(new Registered($players));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
