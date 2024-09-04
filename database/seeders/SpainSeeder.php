<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Players\SpainPlayer;

class SpainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpainPlayer::create(['spain_player_id' => 1, 'country_id' => 2, 'player_name' => 'ダビド ラヤ', 'player_age' => '29', 'club_team_id' => 1]);
        SpainPlayer::create(['spain_player_id' => 2, 'country_id' => 2, 'player_name' => 'カルバハル', 'player_age' => '32', 'club_team_id' => 10]);
        SpainPlayer::create(['spain_player_id' => 3, 'country_id' => 2, 'player_name' => 'マルク ククレジャ', 'player_age' => '26', 'club_team_id' => 7]);
        SpainPlayer::create(['spain_player_id' => 4, 'country_id' => 2, 'player_name' => 'ペドリ', 'player_age' => '21', 'club_team_id' => 11]);
        SpainPlayer::create(['spain_player_id' => 5, 'country_id' => 2, 'player_name' => 'ロドリ', 'player_age' => '28', 'club_team_id' => 5]);
        SpainPlayer::create(['spain_player_id' => 6, 'country_id' => 2, 'player_name' => 'フェラン トーレス', 'player_age' => '24', 'club_team_id' => 11]);
        SpainPlayer::create(['spain_player_id' => 7, 'country_id' => 2, 'player_name' => 'ラミン ヤマル', 'player_age' => '17', 'club_team_id' => 11]);
        SpainPlayer::create(['spain_player_id' => 8, 'country_id' => 2, 'player_name' => 'ミケル オヤルサバル', 'player_age' => '27', 'club_team_id' => 2]);
        SpainPlayer::create(['spain_player_id' => 9, 'country_id' => 2, 'player_name' => 'ファビアン ルイス', 'player_age' => '28', 'club_team_id' => 19]);
        SpainPlayer::create(['spain_player_id' => 10, 'country_id' => 2, 'player_name' => 'ロビン ル ノルマン', 'player_age' => '27', 'club_team_id' => 12]);
    }
}
