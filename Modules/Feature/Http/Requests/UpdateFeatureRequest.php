<?php

namespace Modules\Feature\Http\Requests;

use App\Http\Requests\Request;

class UpdateFeatureRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $feature = $this->route('feature');

        return [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_ \.]+$/|unique:features,name,' . $feature->id
        ];
    }
}
