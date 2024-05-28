<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\CityDomain;

interface DeleteCityInterface
{
    public function delete(int $id): void;
}
