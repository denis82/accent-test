<?php

namespace App\Layers\Presentation\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use App\Layers\Presentation\View\Todo\CityView;

class CreateCityRequest extends FormRequest
{
    public function authorize()
	{
		return true;
	}
    public function rules(): array
    {
        return [
            CityView::CITY_NAME        => 'required|unique:cities|string',
            CityView::CITY_SLUG        => 'nullable|unique:cities|string',
            CityView::CITY_DESCRIPTION => 'nullable|string',
        ];
    }
}
