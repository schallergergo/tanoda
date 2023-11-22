<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Resources\Team\TeamCollection;
use App\Http\Resources\Competition\CompetitionCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{


    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUserwithRole(Request $request)
    {
        try {
            //Validated//
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'role'=>['required',Rule::in(['first-zone', 'second-zone'])],
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'validation error',
                    'data' => $validateUser->errors()
                ], 400);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            //$request->session()->regenerate();
            if ($request->role=="judge") Judge::create(["user_id"=>$user->id]);
            return response()->json([
                'success' => true,
                'message' => 'User Created Successfully',
                'data' => $user,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function team(){
        $user = Auth::user();
        if ($user == null) abort(403);
        return new TeamCollection($user->team);
    }


    public function judge(){

        $user = Auth::user();
        if ($user == null) abort(403);
        if ($user->role !="judge") abort(403);
        $competition = $user->judge->competition;

        return new CompetitionCollection($competition);
    }
    public function judgeOpenForEvaluation(){

        $user = Auth::user();
        if ($user == null) abort(403);
        if ($user->role !="judge") abort(403);
        $competition = $user->judge->competition;
        $now = now();
        $competition = $competition->where("evaluation_start","<",$now)->where("evaluation_end",">",$now);

        return new CompetitionCollection($competition);
    }
    public function organiser(){
        $user = Auth::user();
        if ($user == null) abort(403);
        if ($user->role !="organiser") abort(403);
        return new CompetitionCollection($user->competition);
    }

   
} 



