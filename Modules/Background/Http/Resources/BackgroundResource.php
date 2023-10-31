<?php

namespace Modules\Background\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BackgroundResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'background' => $this->getFirstMedia('background')?->getFullUrl() ?? null,
        ];
    }
}
