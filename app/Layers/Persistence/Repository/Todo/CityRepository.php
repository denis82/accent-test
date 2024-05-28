<?php

namespace App\Layers\Persistence\Repository\Todo;

use App\Layers\Persistence\Entity\Todo\CityPersistence;

class CityRepository
{
    public function insert(CityPersistence $cityPersistence): void
    {
        $cityEloquentModel = new City([
            'name'        => $cityPersistence->getName(),
            'slug'        => $cityPersistence->getSlug(),
            'description' => $cityPersistence->getDescription()
        ]);
        $cityEloquentModel->save();
    }
    public function deleteCity(int $id): void
    {
        City::withTrashed()->where('id', $id)->forceDelete();
    }

    public function getCityById(int $id): CityPersistence
    {
        $cityEloquentModel = City::find($id);
        return $this->makePersistenceEntity($cityEloquentModel);
    }

    public function getCities(): array
    {
        $cityAllEloquentModel = City::all();
        return  $cityAllEloquentModel->map(
            fn (City $cityEloquentModel): CityPersistence => $this->makePersistenceEntity($cityEloquentModel)
        )->toArray();
    }

    private function makePersistenceEntity(City $cityEloquentModel): CityPersistence
    {
        return new CityPersistence(
            $cityEloquentModel->id,
            $cityEloquentModel->name,
            $cityEloquentModel->slug,
            $cityEloquentModel->description
        );
    }

}
