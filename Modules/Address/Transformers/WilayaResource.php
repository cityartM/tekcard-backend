<?php

namespace Modules\Address\Transformers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Models\Wilaya;
/**
 * @mixin Wilaya
 */
class WilayaResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return[
            'id' => $this->id,
            'country_id' => $this->country_id,
            'country' => new CountryResource($this->whenLoaded('country')),
            'name' => $this->name,
            'code' => $this->code,
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }
}
