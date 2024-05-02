<?php

namespace Modules\Card\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Modules\GlobalSetting\Http\Resources\ContactSettingsResource;
use Spatie\QueryBuilder\AllowedInclude;

class CardResource extends JsonResource
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
            'type' => $this->type,
            //'qrCode' => encrypt($this->id),
            'name' => $this->name,
            'full_name' =>  $this->full_name,
            'company_name' =>  $this->company_name,
            'company' =>  $this->company_id != null ? new CompanyResource($this->company) : null,
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
            'card_video' => $this->getFirstMedia('CARD_PDF')?->getFullUrl() ?? null,
            'card_pdf' => $this->getFirstMedia('CARD_VIDEO')?->getFullUrl() ?? null,
            'watermark' => $this->getMedia('WATERMARK')->getUrl() ?? null,
            'card_gallery' => $this->getMedia('CARD_GALLERY')->map?->getUrl() ?? [],
            'card_apps' =>  CardAppsResource::collection($this->contactApps),
            'shared_link' => $this->shared_link,
            'saved_contact' => $this->saved_contact,
            'opened_link' => $this->opened_link,
        ];
    }

}

