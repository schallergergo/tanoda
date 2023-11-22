<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Http\Resources\Team\Billing;

class TeamResource extends JsonResource
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
            "data" =>parent::toArray($request),
            "portfolio"=>new PortfolioResource($this->portfolio),
            "billing_id"=>new BillingResource($this->billing),

        ];
    }
}
