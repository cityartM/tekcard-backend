<?php

namespace App\Http\Resources;

use App\Support\Enum\PartnerEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Transformers\CityResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => (int) $this->id,
            'status' =>  $this->status,
            'name' => $this->name,
            'type' => $this->address,
            'city' => new CityResource($this->whenLoaded('city')),
            'bio' => $this->bio,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'address' => $this->address,
            'avatar' => $this->getMedia(PartnerEnum::AVATAR)->first()->getFullUrl(),
            'reg_com' => $this->getMedia(PartnerEnum::COMMERCIAL_REGISTER_PARTNER)->first()->getFullUrl(),
            'agreement' => $this->getMedia(PartnerEnum::AGREEMENT)->first()->getFullUrl(),
            'verification_at' => $this->verification_at,
        ];
    }

    public static function allowedIncludes(): array
    {
        return ['city'];
    }

}

