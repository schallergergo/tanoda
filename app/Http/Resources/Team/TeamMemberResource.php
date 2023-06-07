<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
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
             "email"=>$this->email,
            ],
        ];
    }
}
