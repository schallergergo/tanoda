<?php
 
namespace App\Http\Resources;
 
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
            "message"=>"Record found",
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}