<?php

namespace Modules\GlobalSetting\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Categories\Models\Category */
class ContactSettingsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'display_name' => $this->display_name,
            'hint' => $this->value,
            'category' => $this->category,
            'icon' => $this->getFirstMedia('Icon contact')->getFullUrl(),
        ];
    }
}
