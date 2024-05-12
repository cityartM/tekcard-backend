<?php

namespace Modules\GlobalSetting\Http\Requests;

use Modules\GlobalSetting\Support\Enum\ContactType;
use Illuminate\Validation\Rule;

use App\Http\Requests\Request;

class CreateSettingContactRequest extends Request
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
            'value' => 'required|string|max:255',
            'icon' => 'image|mimes:jpeg,png,gif,svg|max:2048',
            'icon2' => 'image|mimes:jpeg,png,gif,svg|max:2048',
           // 'type' => ['nullable', Rule::in(ContactType::lists())],
            'category' => 'required|string|max:255',
        ];
    }
}
