<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Players\JapanesePlayer;

class JapanesePlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JapanesePlayer::create(['japanese_player_id' => 1, 'country_id' => 1, 'player_name' => '冨安 健洋', 'player_age' => '25', 'club_team_id' => 1, 'club_team_name' => 'アーセナル']);
        JapanesePlayer::create(['japanese_player_id' => 2, 'country_id' => 1, 'player_name' => '久保 建英', 'player_age' => '23', 'club_team_id' => 2, 'club_team_name' => 'レアル・ソシエダ']);
    }
}
