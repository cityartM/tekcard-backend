<?php

namespace Modules\ContactUser\Http\Requests;

use App\Http\Requests\Request;

class UpdateGroupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $company = $this->user()->company;

        return [
            'display_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id,' . $company->id,
        ];
    }
}
