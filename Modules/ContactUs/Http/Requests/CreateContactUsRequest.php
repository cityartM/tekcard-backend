<?php

namespace Modules\ContactUs\Http\Requests;

use App\Http\Requests\Request;

class CreateContactUsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        ];
    }
}
