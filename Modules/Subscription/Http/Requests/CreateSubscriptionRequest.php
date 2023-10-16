<?php

namespace Modules\Subscription\Http\Requests;

use App\Http\Requests\Request;

class CreateSubscriptionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:subscriptions,email',
        ];
    }
}
