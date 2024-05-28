<?php

namespace App\Layers\Presentation\View\Todo;

use App\App;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Arr;
use App\Layers\Domain\Todo\Entity\CityDomain;

class CityView
{
    public const CITY_ID          = 'id';
    public const CITY_SLUG        = 'slug';
    public const CITY_NAME        = 'name';
    public const CITY_DESCRIPTION = 'description';



    public function __construct()
    {
    }

    public function toInstance(CityDomain $city): array
    {
        return [
            self::CITY_ID          => $city->getCityId(),
            self::CITY_NAME        => $city->getCityName(),
            self::CITY_SLUG        => $city->getCitySlug(),
            self::CITY_DESCRIPTION => $city->getCityDescription(),
        ];
    }

    public function toArray(array $cities): array
    {
        return Arr::map($cities, function (CityDomain $value, string $key) {
            return $this->toInstance($value) ;
        });
    }

    public function cookie(): \Symfony\Component\HttpFoundation\Cookie
    {
        return cookie('CITY_ID',app(App::class)->getCityId(), 1000);
    }

}
