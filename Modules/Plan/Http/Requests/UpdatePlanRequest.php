<?php

namespace Modules\Plan\Http\Requests;

use App\Http\Requests\Request;

class UpdatePlanRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $plan = $this->route('plan');

        return [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_ \.]+$/|unique:plans,name,' . $plan->id
        ];
    }
}
