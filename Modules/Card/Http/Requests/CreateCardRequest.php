<?php

namespace Modules\Card\Http\Requests;

use App\Http\Requests\Request;

class CreateCardRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
        ];
    }
}
