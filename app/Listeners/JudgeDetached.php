<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JudgeDetached
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
            $team->assessment->where("judge_id",$judge->id)->delete();
        }
    }

    
}
