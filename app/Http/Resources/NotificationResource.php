<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;


class NotificationResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'notifiable_type' => $this->notifiable_type,
            'notifiable_id' => $this->notifiable_id,
            'remittance' => new RemittanceResource($this->remittance),
            'data' => $this->data,
            'read_at' => $this->read_at,
            'office_id' => $this->office_id,
            'sending_office_name' => $this->sendOffice->office_name,
            'receiving_office_id' => $this->receiving_office_id,
            'receiving_office_name' => $this->receiveOffice->office_name,
            'created_at' => $this->created_at->format('d-m-y H:i:s A T U'),
        ];
    }

}
