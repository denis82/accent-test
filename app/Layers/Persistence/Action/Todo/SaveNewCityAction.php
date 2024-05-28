<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\Entity\CityDomain;
use App\Layers\Domain\Todo\SaveNewCityInterface;
use App\Layers\Persistence\Model\Todo\CityModel;
use App\Layers\Persistence\Repository\Todo\CityRepository;

class SaveNewCityAction implements SaveNewCityInterface
{
    private CityModel $cityModel;
    private CityRepository $cityRepository;

    public function __construct(
        CityModel $cityModel,
        CityRepository $cityRepository)
    {
        $this->cityModel = $cityModel;
        $this->cityRepository = $cityRepository;
    }

    public function save(CityDomain $city): void
    {
        $this->cityRepository->insert(
            $this->cityModel->fromDomain($city)
        );
    }
}
