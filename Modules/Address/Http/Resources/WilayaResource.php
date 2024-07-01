<?php

namespace Modules\Address\Http\Resources;

use App\Helpers\Helper;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Categories\Models\Category;

/** @mixin Category */
class WilayaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'delivery_price' => $this->delivery_price,
            'country' =>new CountryResource($this->country),
        ];
    }
}
