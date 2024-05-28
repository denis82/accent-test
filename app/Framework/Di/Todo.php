<?php

namespace App\Framework\Di;

use App\Layers\Domain\Todo\DeleteCityInterface;
use App\Layers\Domain\Todo\SaveNewCityInterface;
use App\Layers\Domain\Todo\GetAllCitiesInterface;
use App\Layers\Persistence\Action\Todo\DeleteCityAction;
use App\Layers\Persistence\Action\Todo\SaveNewCityAction;
use App\Layers\Persistence\Action\Todo\GetAllCitiesAction;

class Todo
{
    public function __invoke(): array
    {
        return [
            DeleteCityInterface::class => DeleteCityAction::class,
            SaveNewCityInterface::class => SaveNewCityAction::class,
            GetAllCitiesInterface::class => GetAllCitiesAction::class,
        ];
    }
}
