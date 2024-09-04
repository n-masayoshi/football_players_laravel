<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\DB;

/**
 * $country_idを使って、国名を判別するクラス
 * */
class GetCountryService
{
    public function getCountryNameAndModel($countryId)
    {
        $country_name = '';
        try {
            switch ($countryId) {
                case 1:
                    $country_name = "japan";
                    $players = DB::table('t_japanese_players')->where('country_id', $countryId)->get();
                    break;
                    // case 2:
                    //     $country_name = "spain";
                    //     // $players = SpainPlayer::all();
                    //     break;
                case 3:
                    $country_name = "brazil";
                    $players = DB::table('t_brazil_players')
                        ->join('m_club_teams', 't_brazil_players.club_team_id', '=', 'm_club_teams.club_team_id')
                        ->select('t_brazil_players.*', 'm_club_teams.club_team_name')
                        ->get();
                    break;
                    // case 4:
                    //     $country_name = "france";
                    //     // $players = FrancePlayer::all();
                    //     break;
                    // case 5:
                    //     $country_name = "netherland";
                    //     // $players = NetherlandPlayer::all();
                    //     break;
                    // case 6:
                    //     $country_name = "korea";
                    //     // $players = KoreaPlayer::all();
                    //     break;
                    // case 7:
                    //     $country_name = "switzerland";
                    //     // $players = SwitzerlandPlayer::all();
                    //     break;
                case 8:
                    $country_name = "england";
                    $players = DB::table('t_england_players')
                        ->join('m_club_teams', 't_england_players.club_team_id', '=', 'm_club_teams.club_team_id')
                        ->select('t_england_players.*', 'm_club_teams.club_team_name')
                        ->get();
                    break;
                default:
                    $country_name = "";
                    $players = null;
                    break;
            }
        } catch (Exception $e) {
            return $e;
        }

        return [$country_name, $players];
    }
}
