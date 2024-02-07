<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class CreateShippingRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_id' => 'required|integer',
            'state' => 'required|string|max:255', 
            'zip_code' => 'required|string|max:10', 
            'address' => 'required|string|max:255'
        ];
    }
}
