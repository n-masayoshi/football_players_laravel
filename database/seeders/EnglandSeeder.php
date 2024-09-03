<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Players\EnglandPlayer;

class EnglandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnglandPlayer::create(['england_player_id' => 1, 'country_id' => 8, 'player_name' => 'ニック ポープ', 'player_age' => '32', 'club_team_id' => 9]);
        EnglandPlayer::create(['england_player_id' => 2, 'country_id' => 8, 'player_name' => 'ティノ リヴラメント', 'player_age' => '21', 'club_team_id' => 9]);
        EnglandPlayer::create(['england_player_id' => 3, 'country_id' => 8, 'player_name' => 'ハリー マグワイア', 'player_age' => '31', 'club_team_id' => 6]);
        EnglandPlayer::create(['england_player_id' => 4, 'country_id' => 8, 'player_name' => 'リーヴァイ・コルウィル', 'player_age' => '21', 'club_team_id' => 7]);
        EnglandPlayer::create(['england_player_id' => 5, 'country_id' => 8, 'player_name' => 'リコ ルイス', 'player_age' => '19', 'club_team_id' => 5]);
        EnglandPlayer::create(['england_player_id' => 6, 'country_id' => 8, 'player_name' => 'ジョン・ストーンズ', 'player_age' => '30', 'club_team_id' => 5]);
        EnglandPlayer::create(['england_player_id' => 7, 'country_id' => 8, 'player_name' => 'デクラン・ライス', 'player_age' => '25', 'club_team_id' => 1]);
        EnglandPlayer::create(['england_player_id' => 8, 'country_id' => 8, 'player_name' => 'トレント アレクサンダー アーノルド', 'player_age' => '25', 'club_team_id' => 4]);
        EnglandPlayer::create(['england_player_id' => 9, 'country_id' => 8, 'player_name' => 'コール パーマー', 'player_age' => '22', 'club_team_id' => 7]);
        EnglandPlayer::create(['england_player_id' => 10, 'country_id' => 8, 'player_name' => 'フィル フォーデン', 'player_age' => '24', 'club_team_id' => 5]);
        EnglandPlayer::create(['england_player_id' => 11, 'country_id' => 8, 'player_name' => 'コナー ギャラガー', 'player_age' => '24', 'club_team_id' => 12]);
        EnglandPlayer::create(['england_player_id' => 12, 'country_id' => 8, 'player_name' => 'ハリー ケイン', 'player_age' => '31', 'club_team_id' => 13]);
        EnglandPlayer::create(['england_player_id' => 13, 'country_id' => 8, 'player_name' => 'ジャック グリーリッシュ', 'player_age' => '28', 'club_team_id' => 5]);
        EnglandPlayer::create(['england_player_id' => 14, 'country_id' => 8, 'player_name' => 'ブカヨ サカ', 'player_age' => '23', 'club_team_id' => 1]);
        EnglandPlayer::create(['england_player_id' => 15, 'country_id' => 8, 'player_name' => 'アンソニー ゴードン', 'player_age' => '23', 'club_team_id' => 9]);
        EnglandPlayer::create(['england_player_id' => 16, 'country_id' => 8, 'player_name' => 'ジュード ベリンガム', 'player_age' => '21', 'club_team_id' => 10]);
    }
}
