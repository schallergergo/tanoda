<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class BillingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "success"=>true,
            "message"=>__("Record found"),
            "data" =>[
            "id"=>$this->id,
            "team_id"=>$this->team_id,
            "name"=>$this->name,
            "country"=>$this->country,
            "postcode"=>$this->postcode,
            "city"=>$this->city,
            "street"=>$this->street,
            "house_no"=>$this->house_no,
            "vat_no"=>$this->vat_no,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            ],
        ];
    }
}
