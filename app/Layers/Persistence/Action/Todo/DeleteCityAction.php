<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\DeleteCityInterface;
use App\Layers\Persistence\Model\Todo\CityModel;
use App\Layers\Persistence\Repository\Todo\CityRepository;

class DeleteCityAction implements DeleteCityInterface
{
    private CityModel $cityModel;
    private CityRepository $cityRepository;

    public function __construct(CityModel $cityModel, CityRepository $cityRepository)
    {
        $this->cityModel = $cityModel;
        $this->cityRepository = $cityRepository;
    }

    public function delete(int $id): void
    {
        $this->cityRepository->deleteCity($id);
    }
}
