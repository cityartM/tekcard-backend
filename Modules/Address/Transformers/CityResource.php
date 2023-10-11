<?php

namespace Modules\Address\Transformers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Models\City;

class CityResource extends JsonResource
{
    /** @mixin City */
    public function toArray(Request $request)
    {
        /** @var City $this */
        return[
            'id' => $this->id,
            'wilaya_id' => $this->wilaya_id,
            'wilaya' => new WilayaResource($this->whenLoaded('wilaya')),
            'name' => $this->name,
            'lat' => $this->lat,
            'lon' => $this->lon,
            //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at,
        ];
    }

    public function allowedIncludes(): array
    {
        return ['wilaya'];
    }
}
