<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class UpdateShippingAddRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_id' => 'required|exists:countries,id',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
}
