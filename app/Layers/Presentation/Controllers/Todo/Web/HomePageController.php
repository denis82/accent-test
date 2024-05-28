<?php

namespace App\Layers\Presentation\Controllers\Todo\Web;

use Illuminate\Http\Request;
use App\Layers\UseCase\Todo\GetAllCitiesUseCase;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\Presentation\Controllers\Controller;

class HomePageController extends Controller
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
        $cities = $this->_cityView->toArray(
             $this->_getAllCitiesUseCase->getAll()
        );
        return response()
                ->view('web.index', ['model' => $cities])
                ->cookie($this->_cityView->cookie());
    }

}
