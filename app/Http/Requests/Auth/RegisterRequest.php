<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;


class RegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $rules = [
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed|min:8',
            //'city_id' => 'required|exists:cities,id',
        ];

         if(!$this->isJson()){
             if (setting('registration.captcha.enabled')) {
                 $rules['g-recaptcha-response'] = 'required|captcha';
             }

             if (setting('tos')) {
                 $rules['tos'] = 'accepted';
             }
        }else{
            $rules['device_id'] = 'required';
            $rules['device_token'] = 'required';
            $rules['device_name'] = 'required';
            $rules['brand'] = 'required';
            $rules['app_version'] = 'required';
            $rules['os'] = 'required';
         }


        return $rules;

    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
           // 'tos.accepted' => __('You have to accept Terms of Service.')
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

        return array_merge($this->only('phone', 'first_name','password', 'last_name','birthday','gender','lang','city_id'), [
            'status' => $status,
            'email_verified_at' => setting('reg_email_confirmation') ? null : now()
        ]);
    }
}
