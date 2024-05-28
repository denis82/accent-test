<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\CityBuilder;
use App\Layers\Domain\Todo\Dto\CreateCityDto;
use App\Layers\Domain\Todo\SaveNewCityInterface;

class CreateNewCityUseCase
{
    private CityBuilder $_cityBuilder;
    private SaveNewCityInterface $_saveCity;

    public function __construct(CityBuilder $cityBuilder, SaveNewCityInterface $saveCity)
    {
        $this->_saveCity = $saveCity;
        $this->_cityBuilder = $cityBuilder;
    }

    public function create(CreateCityDto $createCityDto): void
    {
        $city = $this->_cityBuilder->make($createCityDto);
        $this->_saveCity->save($city);
    }
}
