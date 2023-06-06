<?php

namespace App\Http\Controllers;

use App\Models\Judge;

use App\Http\Requests\UpdateJudgeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Judge\JudgeResource;
use App\Http\Resources\Judge\JudgeCollection;
use Illuminate\Support\Facades\Validator;

 

class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JudgeCollection(Judge::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJudgeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

         //Validated
            $validateJudge = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'role'=>"",
                'password' => 'required',
                'phone_number' => ['required',"string",'max:255'],
                'company_name' => ['required',"string",'max:255'],
            ]);

            if($validateJudge->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'validation error',
                    'data' => $validateJudge->errors()
                ], 400);
            }

            $authController = new UserController();

            $userResponse = $authController->createUser($request)->original;

            if (!$userResponse["success"]) return $userResponse;

            $user = $userResponse["data"];
            $user = Judge::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'phone_number' => $request->phone_number,

            ]);

            return response()->json([
                'success' => true,
                'message' => 'Judge Created Successfully',
                'data' => $user,
            ], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Judge  $judge
     * @return \Illuminate\Http\Response
     */
    public function show(Judge $judge)
    {
        return new JudgeResource($judge);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJudgeRequest  $request
     * @param  \App\Models\Judge  $judge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJudgeRequest $request, Judge $judge)
    {
        $data=$request->validated();
        $judge=$judge::update($data);
        return response()->json(["success"=>true,"message"=>__("Judge has been updated"),"data"=>$judge], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Judge  $judge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Judge $judge)
    {
        $judge->delete();
        return response()->json(["success"=>true,"message"=>__("Judge has been deleted")], 200);
    }
}
