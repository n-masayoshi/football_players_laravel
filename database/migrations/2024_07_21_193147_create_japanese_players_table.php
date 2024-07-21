<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_japanese_players', function (Blueprint $table) {
            $table->increments('japanese_player_id');
            $table->integer('country_id')->unsigned()->nullable(false);
            $table->string('player_name', 50)->nullable(false);
            $table->integer('player_age')->unsigned()->nullable(false);
            $table->integer('club_team_id')->unsigned()->nullable(false);
            $table->string('club_team_name', 50)->nullable(false);
            $table->integer('national_team_retired_flag')->unsigned()->default(0);
            $table->integer('player_retired_flag')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('japan_players');
    }
};
