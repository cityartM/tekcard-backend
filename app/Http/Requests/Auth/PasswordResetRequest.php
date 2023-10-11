<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class PasswordResetRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(!$this->isJson()){
            return [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8'
            ];
        }else{
            return [
                'phone' => 'required',
                'password' => 'required|confirmed|min:8',
                'uuid' => 'required',
                'otp' => 'required',
            ];
        }

    }

    /**
     * Get the password reset fields.
     *
     * @return array
     */
    public function credentials()
    {
        return $this->only('email', 'password', 'password_confirmation', 'token');
    }

    public function credentialsApi()
    {
        return $this->only('phone', 'password', 'password_confirmation','token');
    }
}
