<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

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
            
            "id"=>$this->id,
            "company_name"=>$this->company_name,
            "school_name"=>$this->school_name,
            "school_address"=>$this->school_address,
            "scope_of_activities"=>$this->scope_of_activities,
            "available_in_hungarian"=>$this->available_in_hungarian,
            "available_in_english"=>$this->available_in_english,
            "available_in_german"=>$this->available_in_german,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,

        ];
    }
}
