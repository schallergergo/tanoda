<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function edit(Portfolio $portfolio)
    {
        Log::channel('single')->info("assessment.edit");
        $user=Auth::user();
        $user_id=1;
        $data= ['judge_id' => $user_id,'portfolio_id' =>$portfolio->id];
        $assessment = Assessment::where($data)->get();
        if (count($assessment)==0) $assessment = Assessment::create($data);


        return response()->json([
                'success' => true,
                'message' => 'Assessment found',
                'data' => $assessment,
            ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssessmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $portfolio_id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {
        Log::channel('single')->info("assessment.show");
        return response()->json([
                'success' => true,
                'message' => 'Assessment found',
                'data' => $assessment,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssessmentRequest  $request
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssessmentRequest $request, Assessment $assessment)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
