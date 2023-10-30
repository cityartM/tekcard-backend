<?php

namespace Modules\Tag\Http\Requests;

use App\Http\Requests\Request;

class CreateTagRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|array',
        ];
    }
}
