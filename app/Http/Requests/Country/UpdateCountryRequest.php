<?php

namespace App\Http\Requests\Country;

use App\Http\Requests\Request;

class UpdateCountryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $country = $this->route('country');

        return [
            'name_en' => 'required|unique:countries,name_en,' . $country->id
        ];
    }
}
