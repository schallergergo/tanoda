<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Judge;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCoverImageRequest;
use App\Http\Requests\UpdateStandTemplateRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\Competition\CompetitionResource;
use App\Http\Resources\Competition\CompetitionCollection;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Lang;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CompetitionCollection(Competition::all());
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        $now= now();
        $competition=Competition::where("registration_start","<",$now)->where("registration_end",">",$now)->get();
        return new CompetitionCollection($competition);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluation()
    {
        $now= now();
        $competition=Competition::where("evaluation_start","<",$now)->where("evaluation_end",">",$now)->get();
        return new CompetitionCollection($competition);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {

          return new CompetitionResource($competition);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompetitionRequest $request)
    {
        
        //$this->authorize('create', Competition::class);
        
        $data=$request->validated();
        $data=array_merge($data,["organiser_id"=>Auth::user()->id]);

        $competition=Competition::create($data);
        return response()->json(["success"=>true,"message"=>Lang::get("Competition has been created"),"data"=>$competition], 201);
        
    
    }

     public function coverImageUpload(UpdateCoverImageRequest $request,  Competition $competition)
    {
        //$this->authorize('update', Competition::class);
        $file_url=$competition->cover_image_url;

        if (Storage::exists($file_url)) Storage::delete($file_url);

        $data=$request->validated();

        $file = $request->file('cover_image_url')->store('images/'.$competition->id);
        $path = Storage::url($file);
        $competition->update(["cover_image_url"=>$file]);
        return response()->json(["success"=>true,"message"=>Lang::get("Image has been saved"),"data"=>["cover_image_url"=>$path]], 200);
        
    
    }

    public function standTemplateUpload(UpdateStandTemplateRequest $request,  Competition $competition)
    {
        
        //$this->authorize('update', Competition::class);
        $file_url=$competition->stand_template_url;

        if (Storage::exists($file_url)) Storage::delete($file_url);

        $data=$request->validated();

        $file = $request->file('stand_template_url')->store('images/'.$competition->id);
        $path = Storage::url($file);
        $competition->update(["stand_template_url"=>$file]);
        return response()->json(["success"=>true,"message"=>Lang::get("Image has been saved"),"data"=>["stand_template_url"=>$path]], 200);
    
    }

    public function addJudge(Competition $competition, Judge $judge){
        //$this->authorize('update', Competition::class);
        $judges=$competition->judge;
        foreach ($judges as $j){
            if ($judge->id == $j->id) 
                return response()->json(["success"=>false,"message"=>Lang::get("Judge already attached")], 200);
            }
        $competition->judge()->attach($judge->id);
        $this->createAssessment($competition,$judge);

        return response()->json(["success"=>true,"message"=>Lang::get("Judge attached")], 200);
    }

    private function createAssessment(Competition $competition, Judge $judge){
        $portfolios =$competition->portfolio;
        foreach ($portfolios as $portfolio){
            $data=["judge_id"=>$judge->id,"portfolio_id"=>$portfolio->id];
            $assessment = Assessment::withTrashed()->where($data)->get();
            if (count($assessment)==0) Assessment::create($data);
            else $assessment->restore();
        }

    }
    public function removeJudge(Competition $competition, Judge $judge){
        //TODO remove
        //$this->authorize('update', Competition::class);

        $competition->judge()->detach($judge->id);
        $this->removeAssessment($competition,$judge);
        return response()->json(["success"=>true,"message"=>Lang::get("Judge detached")], 200);
        
    }
    private function removeAssessment(Competition $competition, Judge $judge){
        $portfolios =$competition->portfolio;
        foreach ($portfolios as $portfolio){
            $data=["judge_id"=>$judge->id,"portfolio_id"=>$portfolio->id];
            $assessment = Assessment::where($data)->get();
            $assessment->delete();
        }
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionRequest  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        //$this->authorize('update', Competition::class);
        $data=$request->validated();
        $competition=$competition->update($data);
        return response()->json(["success"=>true,"message"=>__("Competition has been updated"),"data"=>$competition], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //$this->authorize('delete', $competition);
        
        $teams=$competition->team;
        if (count($teams)>0) abort(403);
        
        $competition->delete();
        return response()->json(["success"=>true,"message"=>__("Competition has been deleted")], 200);
    }
}
