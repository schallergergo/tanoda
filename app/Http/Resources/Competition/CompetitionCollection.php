<?php
 
namespace App\Http\Resources\Competition;
 
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class CompetitionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request): array
    {
        return [
            "success"=>true,
            "message"=>__("Record found"),
            'data' => $this->collection,
            
        ];
    }
}