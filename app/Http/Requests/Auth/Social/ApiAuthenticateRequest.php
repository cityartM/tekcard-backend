<?php

namespace Hoska\Http\Requests\Auth\Social;

use Illuminate\Validation\Rule;
use Hoska\Http\Requests\Request;

class ApiAuthenticateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'network' => [
                'required',
                Rule::in(config('auth.social.providers'))
            ],
            'social_token' => 'required',
            'device_name' => 'required',
        ];
    }
}
