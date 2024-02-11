<?php

namespace Modules\Companygroups\Http\Requests;

use App\Http\Requests\Request;

class CreateGroupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name' => 'required|string|max:255',
            
        ];
    }
}
