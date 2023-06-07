<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Competition;
use App\Http\Resources\Team\TeamResource;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Auth;
class TeamController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request, Competition $competition)
    {

        
        $data=$request->validated();
        $data=array_merge($data,
            [
            "organiser_id"=>Auth::user()->id,
            "competition_id"=>$competition->id,d
            ]);

        $team=Team::create($data);
        return response()->json(["success"=>true,"message"=>__("Team has been created"),"data"=>$team], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return new TeamResource($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $data=$request->validated();
        $team=Team::update($data);
        return response()->json(["success"=>true,"message"=>__("Team has been updated"),"data"=>$team], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(["success"=>true,"message"=>__("Team has been deleted")], 200);
    }
}
