<?php

namespace App\Http\Requests\Country;

use App\Http\Requests\Request;

class CreateCountryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required|unique:countries,name_en',
            'name_ar' => 'required|unique:countries,name_ar'
        ];
    }
}
