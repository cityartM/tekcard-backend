<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UploadAvatarRawRequest extends Request
{
    public function rules()
    {
        return [
            'file' => 'required|image'
        ];
    }
}
