<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class UpdateRefCardRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_id' => 'required|exists:cards,id',
            'new_reference' => 'required|unique:cards,reference',
        ];
    }
}
