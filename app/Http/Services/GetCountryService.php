<?php

namespace App\Http\Services;

// $country_idを使って、国名を判別するクラス
class GetCountryService
{
    public function getCountryName($country_id)
    {
        $country_name = '';

        switch ($country_id) {
            case 1:
                $country_name = "Japan";
                break;
            case 2:
                $country_name = "Spain";
                break;
            case 3:
                $country_name = "Brazil";
                break;
                // TODO: 他の国も追記する
            default:
                break;
        }

        return $country_name;
    }
}
