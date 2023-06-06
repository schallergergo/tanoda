<?php

namespace App\Http\Controllers;

use App\Models\AssessmentBlock;
use App\Http\Requests\StoreAssessmentBlockRequest;
use App\Http\Requests\UpdateAssessmentBlockRequest;

class AssessmentBlockController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssessmentBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssessmentBlockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentBlock  $assessmentBlock
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentBlock $assessmentBlock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssessmentBlockRequest  $request
     * @param  \App\Models\AssessmentBlock  $assessmentBlock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssessmentBlockRequest $request, AssessmentBlock $assessmentBlock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentBlock  $assessmentBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentBlock $assessmentBlock)
    {
        //
    }
}
