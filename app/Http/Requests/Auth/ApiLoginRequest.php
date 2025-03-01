<?php

namespace App\Http\Requests\Auth;

class ApiLoginRequest extends LoginRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'device_id' => 'required',
            //'device_token' => 'required',
            'device_name' => 'required',
            'brand' => 'required',
            'app_version' => 'required',
            'os' => 'required'
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getCredentials()
    {
        $credentials = parent::getCredentials();

        unset($credentials['password']);

        return $credentials;
    }
}
