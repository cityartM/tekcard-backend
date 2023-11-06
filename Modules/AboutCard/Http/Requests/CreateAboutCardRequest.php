<?php

namespace Modules\AboutCard\Http\Requests;

use App\Http\Requests\Request;
use App\Support\Enum\StrategyDay;
use Modules\AboutCard\Models\AboutCard;



class CreateAboutCardRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            'title' => 'required|array',
            'description' => 'required|array',
        ];
    } 
}
