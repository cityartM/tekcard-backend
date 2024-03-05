<?php

namespace Modules\Plan\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Feature\Http\Resources\FeatureResource;
use Spatie\QueryBuilder\AllowedInclude;

class PlanResource extends JsonResource
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
            'duration' => $this->duration,
            'name' => $this->name,
            'display_name' =>  $this->display_name,
            'type' =>  $this->type,
            'price' =>  $this->price,
            'nbr_user' =>  $this->nbr_user,
            'nbr_card_user' =>  $this->nbr_card_user,
            'has_dashboard' =>  $this->has_dashboard,
            'has_video' =>  $this->has_video,
            'has_pdf' =>  $this->has_pdf,
            'has_multiple_image' =>  $this->has_multiple_image,
            'has_water_mark' =>  $this->has_water_mark,
            'has_share_offline' =>  $this->has_share_offline,
            'share_with_image' =>  $this->share_with_image,
            'has_scan_ia' =>  $this->has_scan_ia,
            'has_group_contact' =>  $this->has_group_contact,
            'has_scan_location' =>  $this->has_scan_location,
            'has_note_contact' =>  $this->has_note_contact,
            'has_statistic' =>  $this->has_statistic,
            'features' => FeatureResource::Collection($this->features),
        ];
    }


}
