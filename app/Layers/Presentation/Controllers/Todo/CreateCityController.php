<?php

namespace App\Layers\Presentation\Controllers\Todo;

use App\Layers\Domain\Todo\Dto\CreateCityDto;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\UseCase\Todo\CreateNewCityUseCase;
use App\Layers\Presentation\Controllers\Controller;
use App\Layers\Presentation\Requests\Todo\CreateCityRequest;

class CreateCityController extends Controller
{
    private CityView $_cityView;
    private CreateNewCityUseCase $_createNewCityUseCase;

    public function __construct(
        CityView $cityView,
        CreateNewCityUseCase $createNewCityUseCase)
    {
         $this->_cityView = $cityView;
         $this->_createNewCityUseCase = $createNewCityUseCase;
    }

    public function create(CreateCityRequest $createCityRequest): \Illuminate\Http\JsonResponse
    {
        $validated = $createCityRequest->validated();

        $createCityDto = new CreateCityDto (
            $validated[CityView::CITY_NAME],
            $validated[CityView::CITY_SLUG],
            $validated[CityView::CITY_DESCRIPTION]
        );

        $this->_createNewCityUseCase->create($createCityDto);

        return response()->json([
            'data' => 'ok'
        ]);
    }

}
