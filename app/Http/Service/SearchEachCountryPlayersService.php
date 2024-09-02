<?php

namespace App\Http\Service;

use App\Models\Players\JapanesePlayer;
use App\Models\Players\EnglandPlayer;
use App\Models\ClubTeam;
use Illuminate\Support\Facades\DB;

/**
 * $country_idを使って、国名を判別するクラス
 * */
class SearchEachCountryPlayersService
{
    public function searchEachCountryPlayers($countryId, $request)
    {
        switch ($countryId) {
            case 1:
                $playersQuery = DB::table('t_japanese_players')
                    ->join('m_club_teams', 't_japanese_players.club_team_id', '=', 'm_club_teams.club_team_id')
                    ->select('t_japanese_players.*', 'm_club_teams.club_team_name');
                if ($request->player_name != null) {
                    $playersQuery->where('t_japanese_players.player_name', 'LIKE', '%' . $request->player_name . '%');
                }
                if ($request->player_age != null) {
                    $playersQuery->where('t_japanese_players.player_age', '=', $request->player_age);
                }
                if ($request->club_team_id != null) {
                    $playersQuery->where('m_club_teams.club_team_id', '=', $request->club_team_id);
                }

                $players = $playersQuery->get();
                break;
            case 2:
                $players = SpainPlayer::all();
                break;
            case 3:
                $players = BrazilPlayer::all();
                break;
            case 4:
                $players = FrancePlayer::all();
                break;
            case 5:
                $players = NetherlandPlayer::all();
                break;
            case 6:
                $players = KoreaPlayer::all();
                break;
            case 7:
                $players = SwitzerlandPlayer::all();
                break;
            case 8:
                $playersQuery = DB::table('t_england_players')
                    ->join('m_club_teams', 't_england_players.club_team_id', '=', 'm_club_teams.club_team_id')
                    ->select('t_england_players.*', 'm_club_teams.club_team_name');
                if ($request->player_name != null) {
                    $playersQuery->where('t_england_players.player_name', 'LIKE', '%' . $request->player_name . '%');
                }
                if ($request->player_age != null) {
                    $playersQuery->where('t_england_players.player_age', '=', $request->player_age);
                }
                if ($request->club_team_id != null) {
                    $playersQuery->where('m_club_teams.club_team_id', '=', $request->club_team_id);
                }

                $players = $playersQuery->get();
                break;
            default:
                break;
        }

        return ($players);
    }
}
