<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class CheckUserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required',
        ];
    }


}
