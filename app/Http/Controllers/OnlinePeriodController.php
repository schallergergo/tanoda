<?php

namespace App\Http\Controllers;

use App\Models\OnlinePeriod;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOnlinePeriodRequest;
use App\Http\Requests\UpdateOnlinePeriodRequest;

class OnlinePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        
        $onlinePeriod = OnlinePeriod::where("team_id",$team->id)->get();
        return new OnlinePeriodCollection($onlinePeriod);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOnlinePeriodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOnlinePeriodRequest $request)
    {
        $this->authorize("create",OnlinePeriod::class);
        $data = $request->validated();
        $data = array_merge($data,["team_id"=>$user->team->id]);
        $onlinePeriod=OnlinePeriod::create($data);
        return response()->json(["success"=>true,"message"=>__("Record has been created"),"data"=>$onlinePeriod], 201);

    }

   
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlinePeriod $onlinePeriod)
    {
        $this->authorize("delete",$onlinePeriod);
        $onlinePeriod->delete();
        return response()->json(["success"=>true,"message"=>__("Record has been deleted")], 200);
    }
}
