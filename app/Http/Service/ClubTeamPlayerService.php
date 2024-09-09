<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\DB;

/**
 * $country_idを使って、国名を判別するクラス
 * 取得項目：選手名、年齢、国名
 * */
class ClubTeamPlayerService
{
    public function getPlayers($clubTeamId)
    {
        try {
            $englandPlayers = DB::table('t_england_players AS en')
                ->join('countries AS c', 'en.country_id', '=', 'c.country_id')
                ->select('en.player_name', 'en.player_age', 'c.country_name')
                ->where('en.club_team_id', $clubTeamId);
            $brazilPlayers = DB::table('t_brazil_players AS bz')
                ->join('countries AS c', 'bz.country_id', '=', 'c.country_id')
                ->select('bz.player_name', 'bz.player_age', 'c.country_name')
                ->where('bz.club_team_id', $clubTeamId);
            $spainPlayers = DB::table('t_spain_players AS sp')
                ->join('countries AS c', 'sp.country_id', '=', 'c.country_id')
                ->select('sp.player_name', 'sp.player_age', 'c.country_name')
                ->where('sp.club_team_id', $clubTeamId);
            $players = DB::table('t_japanese_players AS jp')
                ->join('countries AS c', 'jp.country_id', '=', 'c.country_id')
                ->select('jp.player_name', 'jp.player_age', 'c.country_name')
                ->where('jp.club_team_id', $clubTeamId)
                ->union($englandPlayers)
                ->union($brazilPlayers)
                ->union($spainPlayers)
                ->get();
        } catch (Exception $e) {
            return $e;
        }
        return $players;
    }

    public function searchPlayers($request, $clubTeamId)
    {
        try {
            $englandPlayers = DB::table('t_england_players AS en')
                ->join('countries AS c', 'en.country_id', '=', 'c.country_id')
                ->select('en.player_name', 'en.player_age', 'c.country_name')
                ->where('en.club_team_id', $clubTeamId);
            if ($request->player_name != null) {
                $englandPlayers->where('en.player_name', 'LIKE', '%' . $request->player_name . '%');
            }
            if ($request->player_age != null) {
                $englandPlayers->where('en.player_age', '=', $request->player_age);
            }

            $brazilPlayers = DB::table('t_brazil_players AS bz')
                ->join('countries AS c', 'bz.country_id', '=', 'c.country_id')
                ->select('bz.player_name', 'bz.player_age', 'c.country_name')
                ->where('bz.club_team_id', $clubTeamId);
            if ($request->player_name != null) {
                $brazilPlayers->where('bz.player_name', 'LIKE', '%' . $request->player_name . '%');
            }
            if ($request->player_age != null) {
                $brazilPlayers->where('bz.player_age', '=', $request->player_age);
            }

            $spainPlayers = DB::table('t_spain_players AS sp')
                ->join('countries AS c', 'sp.country_id', '=', 'c.country_id')
                ->select('sp.player_name', 'sp.player_age', 'c.country_name')
                ->where('sp.club_team_id', $clubTeamId);
            if ($request->player_name != null) {
                $spainPlayers->where('sp.player_name', 'LIKE', '%' . $request->player_name . '%');
            }
            if ($request->player_age != null) {
                $spainPlayers->where('sp.player_age', '=', $request->player_age);
            }

            $players = DB::table('t_japanese_players AS jp')
                ->join('countries AS c', 'jp.country_id', '=', 'c.country_id')
                ->select('jp.player_name', 'jp.player_age', 'c.country_name')
                ->where('jp.club_team_id', $clubTeamId);
            if ($request->player_name != null) {
                $players->where('jp.player_name', 'LIKE', '%' . $request->player_name . '%');
            }
            if ($request->player_age != null) {
                $players->where('jp.player_age', '=', $request->player_age);
            }
            // TODO: 国名検索（セレクトボックス）

            $players = $players
                ->union($englandPlayers)
                ->union($brazilPlayers)
                ->union($spainPlayers)
                ->get();

            if ($players == null) {
                $players = [];
            }
        } catch (Exception $e) {
            return $e;
        }
        return $players;
    }
}
