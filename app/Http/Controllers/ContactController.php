<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Competition;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

use App\Http\Resources\Contact\ContactResource;
use App\Http\Resources\Contact\ContactCollection;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competition $competition)
    {
        $contact = Contact::where("competition_id",$competition->id)->get();
        
        return new ContactCollection($contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request,Competition $competition)
    {
        

        $data = $request->validated();
        $data = array_merge($data, ["competition_id"=>$competition->id]);

        $contact = Contact::create($data);

        return response()->json(["success"=>true,"message"=>__("Competition has been created"),"data"=>$contact], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $data = $request->validated();

        $contact = $contact->update($data);

        return response()->json(["success"=>true,"message"=>__("Competition has been updated"),"data"=>$contact], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
                

        $contact = $contact->delete();

        return response()->json(["success"=>true,"message"=>__("Competition has been deleted"),"data"=>$contact], 200);
    }
}
