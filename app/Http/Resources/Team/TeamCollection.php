<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamCollection extends ResourceCollection
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
