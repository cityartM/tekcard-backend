<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isJson()){
            return [
                'email' => 'required',
                'password' => 'required'
            ];
        }else{
            return [
                'username' => 'required',
                'password' => 'required'
            ];
        }

    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getCredentials()
    {
        // The form field for providing username or password
        // have name of "username", however, in order to support
        // logging users in with both (username and email and phone)
        // we have to check if user has entered one or another
       // $phone = $this->get('phone');
        //$username = $this->get('username');
        $username = $this->get('email');

        if ($this->isJson()) {
            if($this->isEmail($username)){
                return [
                    'email' => $username,
                    'password' => $this->get('password')
                ];
            }
            return $this->only('phone', 'password');
        }else{
            if ($this->isEmail($username)) {
                return [
                    'email' => $username,
                    'password' => $this->get('password')
                ];
            }
            return $this->only('username', 'password');
        }


    }

    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email'],
        )->fails();
    }

    private function isPhone($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['phone' => 'phone'],
        )->fails();
    }

}
