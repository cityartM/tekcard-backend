<?php

namespace Modules\Address\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Categories\Models\Category;
use Modules\Features\Http\Resources\FeatureResource;
use Modules\Properties\Http\Resources\PropertiesResource;

/** @mixin Category */
class WilayaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
