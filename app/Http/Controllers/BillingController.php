<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Http\Requests\StoreBillingRequest;
use App\Http\Requests\UpdateBillingRequest;
Use App\Http\Requests\Team\BillingResource;
class BillingController extends Controller
{
    

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        return new BillingResource($billing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillingRequest  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillingRequest $request, Billing $billing)
    {
        //$this->authorize('update', Billing::class);
        $data=$request->validated();
        $competition=$competition->update($data);
        return response()->json(["success"=>true,"message"=>__("Billing data has been updated"),"data"=>$billing], 200);
    }

    
}
