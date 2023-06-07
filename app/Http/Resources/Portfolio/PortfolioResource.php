<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
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
             "motto"=>$this->motto,
            "company_description"=>$this->company_description,
             "logo"=>$this->logo,
             "flyer"=>$this->flyer,
             "webpage"=>$this->webpage,
             "catalog"=>$this->catalog,
             "business_card"=>$this->business_card,
             "presentation"=>$this->presentation,
             "stand_image"=>$this->stand_image,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            ],
        ];
    }
}
