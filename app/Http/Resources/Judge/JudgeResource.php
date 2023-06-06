<?php

namespace App\Http\Resources\Judge;


use Illuminate\Http\Resources\Json\JsonResource;

class JudgeResource extends JsonResource
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
            "name" => $this->user->name,
            "email" => $this->user->email,
            "phone_number"=>$this->phone_number,
            "company_name"=>$this->company_name,
            
            ],
        ];
    }
}
