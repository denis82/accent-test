<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\GetAllCitiesInterface;

class GetAllCitiesUseCase
{
    private GetAllCitiesInterface $_getAllCities;

    public function __construct(GetAllCitiesInterface $getCities)
    {
         $this->_getAllCities = $getCities;
    }

    public function getAll(): array
    {
         return $this->_getAllCities->getAll();
    }
}
