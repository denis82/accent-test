<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\CityDomain;

interface GetCityByIdInterface
{
    public function get(int $id): CityDomain;
}
