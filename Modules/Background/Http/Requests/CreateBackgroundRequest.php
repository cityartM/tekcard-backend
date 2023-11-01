<?php

namespace Modules\Background\Http\Requests;

use App\Http\Requests\Request;
use App\Support\Enum\StrategyDay;
use Modules\Background\Models\Background;

use App\Support\Enum\BackgroundCategories;
use App\Support\Enum\Status;

class CreateBackgroundRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            'type' => 'required|string',
        ];
    } 
}
