<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JudgeAttached
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $competition = $event->competition;
        $judge = $event->judge;
        $teams = $competition->team;
        foreach($teams as $team){
            Assessment::create(["team_id",$team->id,"judge_id",$judge->id]);
        }
    }
}
