<?php

namespace App\Http\Resources\Competition;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Judge\JudgeCollection;
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
            "message"=>__("Record found"),
            "data" =>parent::toArray($request),
        ];
    }
}