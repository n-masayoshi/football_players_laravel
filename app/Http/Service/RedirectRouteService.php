<?php

namespace App\Http\Service;

use App\Providers\RouteServiceProvider;

/**
 * $country_idを使って、国名を判別するクラス
 * */
class RedirectRouteService
{
    public function getRedirectRouteService($countryId)
    {
        switch ($countryId) {
            case 1:
                return RouteServiceProvider::JAPANESE_PLAYERS_INDEX;
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                return RouteServiceProvider::ENGLAND_PLAYERS_INDEX;
                break;
            default:
                break;
        }
    }
}
