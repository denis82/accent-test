<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\CityDomain;

interface SaveNewCityInterface
{
    public function save(CityDomain $city): void;
}
