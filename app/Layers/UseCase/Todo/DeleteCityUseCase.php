<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\DeleteCityInterface;
use App\Layers\Domain\Todo\CityBuilder;

class DeleteCityUseCase
{
    private CityBuilder $_cityBuilder;
    private DeleteCityInterface $_deleteCity;

    public function __construct(DeleteCityInterface $deleteCity, CityBuilder $cityBuilder)
    {
         $this->_deleteCity = $deleteCity;
         $this->_cityBuilder = $cityBuilder;
    }

    public function delete(int $id): void
    {
        $this->_deleteCity->delete($id);
    }
}
