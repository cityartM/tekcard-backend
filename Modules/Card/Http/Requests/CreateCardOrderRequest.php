<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class CreateCardOrderRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_ids.*' => 'required|exists:cards,id',
            'quantity' => 'required|integer',
            'color' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            //'company_id' => 'nullable|exists:companies,id',
        ];
    }
}
