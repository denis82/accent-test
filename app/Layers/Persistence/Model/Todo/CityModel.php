<?php

namespace App\Layers\Persistence\Model\Todo;

use App\Layers\Domain\Todo\Entity\CityDomain;
use App\Layers\Persistence\Entity\Todo\CityPersistence;

class CityModel
{
    public function toDomain(CityPersistence $cityPersistence): CityDomain
    {
        return new CityDomain(
            $cityPersistence->getId(),
            $cityPersistence->getName(),
            $cityPersistence->getSlug(),
            $cityPersistence->getDescription()
        );
    }
    public function fromDomain(CityDomain $city): CityPersistence
    {
        return new CityPersistence(
            $city->getCityId(),
            $city->getCityName(),
            $city->getCitySlug(),
            $city->getCityDescription()
        );
    }
}
