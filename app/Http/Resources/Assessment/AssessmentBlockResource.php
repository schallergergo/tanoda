<?php

namespace App\Http\Resources\Assessment;

use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentBlockResource extends JsonResource
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

            "data" =>parent::toArray($request),

        ];
    }
}
