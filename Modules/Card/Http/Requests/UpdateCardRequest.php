<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class UpdateCardRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $card = $this->route('card');
        return [
            'name' => 'required|string|unique:cards,name,' . $card->id,
            'full_name' => 'required|string|unique:cards,full_name,' . $card->id,
        ];
    }
}
