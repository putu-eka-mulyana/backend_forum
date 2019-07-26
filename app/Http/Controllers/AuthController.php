<?php

namespace App\Http\Controllers;

use JWTAuth;
use Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
class AuthController extends Controller
{
    public function signup(Request $request){
        $this->validate($request,[
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        $save = User::create([
            'username' => $request->json('username'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);
        if ($save) {
    		$res = array(
    			'status' => true
    		);
    	}else{
			$res = array(
    			'status' => false
    		);
    	}
    	return response()->json($res);
    }
    public function signin(Request $request ){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = Input::only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return Response::json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return Response::json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json([
            'user_id' => $request->user()->id,
            'username' => $request->user()->username,
            'email' => $request->user()->email,
            'token' => $token
        ]);
    }
     
}
