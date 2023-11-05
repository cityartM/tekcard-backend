<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class CreateCardContactRequest extends Request
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
            'remark_id' => 'nullable|exists:remarks,id',
            'group' => 'required|in:Peoples,Works',
        ];
    }
}
