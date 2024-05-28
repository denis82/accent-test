<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Persistence\Model\Todo\CityModel;
use App\Layers\Domain\Todo\GetAllCitiesInterface;
use App\Layers\Persistence\Entity\Todo\CityPersistence;
use App\Layers\Persistence\Repository\Todo\CityRepository;

class GetAllCitiesAction implements GetAllCitiesInterface
{
    private CityModel $_cityModel;
    private CityRepository $_cityRepository;

    public function __construct(CityModel $cityModel,  CityRepository $cityRepository)
    {
        $this->_cityModel = $cityModel;
        $this->_cityRepository = $cityRepository;
    }

    public function getAll(): array
    {
        return array_map(
            function (CityPersistence $cityPersistence){
                return $this->_cityModel->toDomain($cityPersistence);
            },
            $this->_cityRepository->getCities()
        );
    }
}
