<?php

namespace App\Http\Resources\Assessment;

use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentResource extends JsonResource
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
            "assessment_block"=>new AssessmentBlockCollection($this->block),
        ];
    }
}
