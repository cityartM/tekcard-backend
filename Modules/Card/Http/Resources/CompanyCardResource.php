<?php

namespace Modules\Card\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Modules\GlobalSetting\Http\Resources\ContactSettingsResource;

class CompanyCardResource extends JsonResource
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
            'reference' => $this->reference,
            'name' => $this->name,
            'full_name' =>  $this->full_name,
            'company_name' =>  $this->company_name,
            'job_title' =>  $this->job_title,
            'background' =>  new BackgroundResource($this->background),
            'color' =>  $this->color,
            'is_single_link' =>  $this->is_single_link,
            'single_link_contact_id' =>  new ContactSettingsResource($this->singleLink),
            'is_main' =>  $this->is_main,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
            'url_web_site' =>  $this->url_web_site,
            'iban' =>  $this->iban,
            'lat' =>  $this->lat,
            'lon' =>  $this->lon,
            'address' =>  $this->address,
            'note' =>  $this->note,
            'card_avatar' => $this->getFirstMedia('CARD_AVATAR')?->getFullUrl() ?? null,
            'card_apps' =>  CardAppsResource::collection($this->contactApps),
        ];
    }

}

