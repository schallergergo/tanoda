<?php

namespace App\Http\Resources\OnlinePeriod;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlinePeriodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
            "success"=>true,
            "message"=>__("Record found"),
            "data" =>parent::toArray($request),
    }
}
