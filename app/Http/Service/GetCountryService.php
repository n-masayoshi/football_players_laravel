<?php

namespace App\Http\Service;

use App\Models\Players\JapanesePlayer;

// $country_idを使って、国名を判別するクラス
class GetCountryService
{
    public function getCountryNameAndModel($country_id)
    {
        $country_name = '';
        switch ($country_id) {
            case 1:
                $country_name = "Japan";
                $players = JapanesePlayer::all();
                break;
            case 2:
                $country_name = "Spain";
                $players = SpainPlayer::all();
                break;
            case 3:
                $country_name = "Brazil";
                $players = BrazilPlayer::all();
                break;
                // TODO: 他の国も追記する
            default:
                break;
        }

        return [$country_name, $players];
    }
}
