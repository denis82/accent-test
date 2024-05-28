<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Dto\CreateCityDto;
use App\Layers\Domain\Todo\Entity\CityDomain;

class CityBuilder
{
    //private GetCityByIdInterface $_getCityById;
    public function __construct()
    {
       // $this->_getCityById = $getCityById;
    }

    public function make(CreateCityDto $createCityDto): CityDomain
    {
        return new CityDomain(
            null,
            $createCityDto->getName(),
            $createCityDto->getSlug(),
            $createCityDto->getDescription(),
        );
    }

    // public function delete(int $id): int
    // {
    //     $city = $this->_getCityById->get($id);
    //     return $city->getCityFlag();
    // }
}
