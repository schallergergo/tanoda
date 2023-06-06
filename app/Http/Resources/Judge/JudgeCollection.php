<?php

namespace App\Http\Resources\Judge;

use Illuminate\Http\Resources\Json\ResourceCollection;

class JudgeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
          return [
            "success"=>true,
            "message"=>__("Record found"),
            'data' => $this->collection,
            
        ];
    }
}
