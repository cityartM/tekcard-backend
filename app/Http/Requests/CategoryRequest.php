<?php

namespace App\Http\Requests;

class CategoryRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'display_name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
