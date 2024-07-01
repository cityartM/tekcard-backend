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
            'delivery_price' => $this->delivery_price,
            //'can_delivery' => $this->display ? true : false,
        ];
    }
}
