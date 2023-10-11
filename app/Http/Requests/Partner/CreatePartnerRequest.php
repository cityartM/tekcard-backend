<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;

class CreatePartnerRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:partners,name',
        ];
    }
}
