<?php

namespace Modules\ContactUser\Http\Requests;

use App\Http\Requests\Request;

class CreateRemarkRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ];
    }
}
