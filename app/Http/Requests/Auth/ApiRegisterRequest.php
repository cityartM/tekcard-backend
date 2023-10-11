<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;


class ApiRegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'device_id' => 'required',
            'device_token' => 'required',
            'device_name' => 'required',
            'brand' => 'required',
            'app_version' => 'required',
            'os' => 'required',
        ];

    }

    /**
     * Get the valid request data.
     *
     * @return array
     */
    public function validFormData()
    {
        // Determine user status. User's status will be set to UNCONFIRMED
        // if he has to confirm his email or to ACTIVE if email confirmation is not required
        $status = setting('reg_email_confirmation')
            ? UserStatus::UNCONFIRMED
            : UserStatus::ACTIVE;

        return array_merge($this->only('email', 'first_name','password', 'last_name','birthday','gender','lang'), [
            'status' => $status,
            'email_verified_at' => setting('reg_email_confirmation') ? null : now()
        ]);
    }
}
