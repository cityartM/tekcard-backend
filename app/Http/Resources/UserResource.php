<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Http\Resources\ShippingResource;
use Modules\Company\Http\Resources\CompanyResource;
use Modules\Plan\Http\Resources\PlanResource;
use Modules\Plan\Http\Resources\UserPlanResource;
use Modules\Subscription\Http\Resources\SubscriptionResource;
use App\Http\Resources\RoleResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            //'first_name' => $this->first_name,
            //'last_name' => $this->last_name,
            'role' => $this->resource->role->name,//new RoleResource($this->resource->role),
            'username' => $this->username,
            'email' => $this->email,
            'lang' => $this->lang,
            //'phone' => $this->phone,
            //'birthday' => $this->birthday ? Carbon::parse($this->birthday)->format('Y-m-d') : null,
            //'gender' => $this->gender,
            //'avatar' => $this->resource->present()->avatar,
            'status' => $this->status,
            'email_verified_at' => $this->email_verified_at ? (string) $this->email_verified_at : null,
            'created_at' => $this->created_at,
            'timezone' => $this->timezone,
            'socialite' => $this->socialite,
            'avatar' => $this->present()->avatar,
            'plan' => $this->plan ? new UserPlanResource($this->plan->first()) : null,
            'company' => $this->company ? new CompanyResource($this->company) : null,
            'cards' => CardResource::collection($this->cards),
            'shipping' => new ShippingResource($this->mainShipping()),
            'shared_link' => $this->cards->sum('shared_link'),
            'saved_contact' => $this->cards->sum('saved_contact'),
            'opened_link' => $this->cards->sum('opened_link'),
            //'address' => $this->address,
            // 'country_id' => $this->country_id ? (int) $this->country_id : null,
            //'role_id' => (int) $this->role_id,
            //'birthday' => $this->birthday ? $this->birthday->format('Y-m-d') : null,
            //'last_login' => (string) $this->last_login,
            //'two_factor_country_code' => (int) $this->two_factor_country_code,
            //'two_factor_phone' => (string) $this->two_factor_phone,
            //'two_factor_options' => json_decode($this->two_factor_options, true),
            //'email_verified_at' => $this->email_verified_at ? (string) $this->email_verified_at : null,
           //'created_at' => (string) $this->created_at,
           // 'updated_at' => (string) $this->updated_at,
           // 'country' => new CountryResource($this->whenLoaded('country')),
            /*'role' => $this->when($this->canViewRole($request), function () {
                return new RoleResource($this->resource->role);
            }),*/

        ];
    }

    private function canViewRole(\Illuminate\Http\Request $request)
    {
        return $this->resource->relationLoaded('role')
            && $request->user()->hasPermission('roles.manage');
    }

    public static function allowedIncludes()
    {
        return ['role', 'country'];
    }
}
