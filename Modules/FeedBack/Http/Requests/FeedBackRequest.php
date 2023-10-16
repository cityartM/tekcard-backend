<?php

namespace Modules\FeedBack\Http\Requests;

use App\Http\Requests\Request;

class FeedBackRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'comment' => 'required',
        ];
    }
}
