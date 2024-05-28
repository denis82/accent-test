<?php

namespace App\Layers\Presentation\Controllers\Todo;


use App\Layers\UseCase\Todo\DeleteCityUseCase;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\Presentation\Controllers\Controller;

class DestroyCityController extends Controller
{
    private CityView $_cityView;
    private DeleteCityUseCase $_deleteCityUseCase;

    public function __construct(
        CityView $cityView,
        DeleteCityUseCase $deleteCityUseCase)
    {
         $this->_cityView = $cityView;
         $this->_deleteCityUseCase = $deleteCityUseCase;
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->_deleteCityUseCase->delete($id);

        return redirect()->to("/")->with('success', 'Запись удалена');
    }
}
