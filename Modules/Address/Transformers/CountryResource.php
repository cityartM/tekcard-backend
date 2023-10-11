<?php

namespace Modules\Address\Transformers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Models\Country;
/** @mixin Country */
class CountryResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
