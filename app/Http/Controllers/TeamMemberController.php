<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;

use App\Http\Resources\Team\TeamMemberResource;
use App\Http\Resources\Team\TeamMemberCollection;


class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $members=TeamMember::where("team_id",$team->id)->get();

        return new TeamMemberCollection($members);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMemberRequest $request,Team $team)
    {
         //$this->authorize('create', TeamMember::class);
        $data=$request->validated();
        $data=array_merge($data,["team_id"=>$team->id]);
        $teammember=Teammember::create($data);
        return response()->json(["success"=>true,"message"=>__("Teammember has been created"),"data"=>$teammember], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        return new TeamMemberResource($teamMember);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamMemberRequest  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $data->validated();
        $teammember=Teammember::update($data);
        return response()->json(["success"=>true,"message"=>__("Teammember has been updated"),"data"=>$teammember], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return response()->json(["success"=>true,"message"=>__("Teammember has been deleted")], 200);
    }
}
