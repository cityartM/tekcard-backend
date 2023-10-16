<?php

namespace Modules\Blog\Http\Requests;

use App\Http\Requests\Request;
use App\Support\Enum\StrategyDay;
use Modules\Blog\Models\Blog;


class CreateBlogRequest extends Request
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
            'content' => 'required|array',
            'tumail' => 'image|mimes:jpeg,png,gif|max:2048',
            'type' => 'required|string',
        ];
    } 
}
