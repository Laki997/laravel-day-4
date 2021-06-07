<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;


    public function authenticate(Request $request){
    
       info($request);
        $credentials = $request->only(['email','password']);


        try {

            if (! $token = \JWTAuth::attempt($credentials)){
                return response()->json(['error','invalid_credentials'],401);
            }
        }
        catch(JWTException $e){
            return response()->json(['error','something_wrong_with_creating_token'],500);
        }

        return response()->json(compact('token'));

    }

    public function register(RegisterRequest $request){

        info($request);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
         User::create($data);

        //  auth()->authenticate($user);

        // return redirect('/movies');

        // \JWTAuth::login($user);
    }

}
