<?php

namespace Modules\Plan\Http\Requests;

use App\Http\Requests\Request;

class CreateUserPlanRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'plan_id' => 'required|exists:plans,id',
        ];
    }
}
