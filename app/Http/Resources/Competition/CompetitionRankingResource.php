<?php

namespace App\Http\Resources\Competition;
use App\Models\Competition;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionRankingResource extends JsonResource
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
            "competition" =>parent::toArray($request),
            "teams"=>$this->calculateRanking($this->resource)

        ];
        
    }

    private  function calculateRanking(Competition $competition){
        $teams = $competition->team;
        $rankingArray = array();
        foreach ($teams as $team){
            $total_point = $team->assessment->sum('total_point');
            $rankingArray[] =['team'=>$team,'ranking'=>0,'total_point'=>rand(1,10)];
        }
         usort($rankingArray, 
            function ($a, $b) {
                return $b['total_point'] - $a['total_point'];
                    });

        if (count($rankingArray)>0) $rankingArray[0]["ranking"]=1;
        $count=0;
        for($i=1;$i<count($rankingArray);$i++)
        {
            if ($rankingArray[$i]["total_point"] != $rankingArray[$i-1]["total_point"]) $count=$i+1;
            $rankingArray[$i]["ranking"]=$count;
            
        }


        return $rankingArray;
    }   

    
}
