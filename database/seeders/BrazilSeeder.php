<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Players\BrazilPlayer;

class BrazilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrazilPlayer::create(['brazil_player_id' => 1, 'country_id' => 3, 'player_name' => 'アリソン ベッケル', 'player_age' => '32', 'club_team_id' => 4]);
        BrazilPlayer::create(['brazil_player_id' => 2, 'country_id' => 3, 'player_name' => 'マルキーニョス', 'player_age' => '30', 'club_team_id' => 19]);
        BrazilPlayer::create(['brazil_player_id' => 3, 'country_id' => 3, 'player_name' => 'ダニーロ', 'player_age' => '33', 'club_team_id' => 22]);
        BrazilPlayer::create(['brazil_player_id' => 4, 'country_id' => 3, 'player_name' => 'エデル ミリトン', 'player_age' => '26', 'club_team_id' => 10]);
        BrazilPlayer::create(['brazil_player_id' => 5, 'country_id' => 3, 'player_name' => 'ガブリエウ マガリャンイス', 'player_age' => '26', 'club_team_id' => 1]);
        BrazilPlayer::create(['brazil_player_id' => 6, 'country_id' => 3, 'player_name' => 'ブルーノ ギマランイス', 'player_age' => '26', 'club_team_id' => 9]);
        BrazilPlayer::create(['brazil_player_id' => 7, 'country_id' => 3, 'player_name' => 'ロドリゴ', 'player_age' => '23', 'club_team_id' => 10]);
        BrazilPlayer::create(['brazil_player_id' => 8, 'country_id' => 3, 'player_name' => 'ヴィニシウス Jr', 'player_age' => '24', 'club_team_id' => 10]);
        BrazilPlayer::create(['brazil_player_id' => 9, 'country_id' => 3, 'player_name' => 'サヴィーニョ', 'player_age' => '20', 'club_team_id' => 5]);
        BrazilPlayer::create(['brazil_player_id' => 10, 'country_id' => 3, 'player_name' => 'エンドリッキ', 'player_age' => '18', 'club_team_id' => 10]);
        BrazilPlayer::create(['brazil_player_id' => 11, 'country_id' => 3, 'player_name' => 'エデルソン モラエス', 'player_age' => '31', 'club_team_id' => 5]);
    }
}
