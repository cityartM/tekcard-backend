<?php

namespace Modules\Card\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Modules\ContactUser\Http\Resources\RemarkResource;
use Modules\GlobalSetting\Http\Resources\ContactSettingsResource;
use Spatie\QueryBuilder\AllowedInclude;

class CardContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'card' => new CardResource($this->card),
            'remark' => new RemarkResource($this->remark),
            'group' => $this->group,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'address' => $this->address,
        ];
    }

}

