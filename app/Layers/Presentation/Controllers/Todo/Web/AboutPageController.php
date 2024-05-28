<?php

namespace App\Layers\Presentation\Controllers\Todo\Web;

use Illuminate\Http\Request;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\UseCase\Todo\GetAllCitiesUseCase;
use App\Layers\Presentation\Controllers\Controller;

class AboutPageController extends Controller
{
    private CityView $_cityView;
    private GetAllCitiesUseCase $_getAllCitiesUseCase;

    public function __construct(
        CityView $cityView,
        GetAllCitiesUseCase $getAllCitiesUseCase)
    {

        $this->_cityView = $cityView;
        $this->_getAllCitiesUseCase = $getAllCitiesUseCase;
    }

    public function get(Request $request)
    {
        return response()->view('web.about');
    }

}
