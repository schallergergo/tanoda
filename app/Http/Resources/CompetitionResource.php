<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionResource extends JsonResource
{
    
     public function toArray($request): array
    {
        /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
        return [
            "success"=>true,
            "message"=>"Record found",
            "data" =>[
            "name" => $this->name,
            "duration_in_days"=> $this->duration_in_days,
            "registration_fee"=>$this->registration_fee,
            "registration_start"=>$this->registration_start,
            "registration_end"=>$this->registration_end,
            "cover_photo_url"=> $this->cover_photo_url,
            "evaluation_start"=>$this->evaluation_start,
            "evaluation_end"=>$this->evaluation_end,
            "comment" => $this->comment,
            "stand_templete" => $this->stand_templete,
            "stand_description_hu"=> $this->stand_description_hu,
            "stand_description_en"=> $this->stand_description_en,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            ],
        ];
    }
}