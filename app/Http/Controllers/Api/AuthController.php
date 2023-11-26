<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
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

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => 400,
                    'message' => 'validation error',
                    'data' => $validateUser->errors()
                ], 400);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => 401,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken(Str::random(40));
            return response()->json([
                'user'=>$user,
                'token'=> $token->plainTextToken,
                'status' => 200,
                'message' => 'User Logged In Successfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function logoutUser(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            $user = User::where('email', $request->email)->first();

            $user->tokens()->delete();

            return response()->json(['success'=>'Logged Out Successfully!']);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
} 


